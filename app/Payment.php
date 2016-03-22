<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Quota;
use App\Loan;

class Payment extends Model {

    public function formofpayment() {
        return $this->belongsTo("App\Formofpayment");
    }

    public function quota() {
        return $this->belongsTo("App\Quota");
    }

    public function user() {
        return $this->belongsTo("App\User");
    }

    public function loan() {
        return $this->hasMany("App\Loan");
    }

    public function scopeSearch($query, $search) {

        return $query->join('quotas', 'quotas.id', '=', 'payments.quota_id')
                        ->select('payments.*', 'quotas.loan_id')
                        ->where('quotas.loan_id', 'LIKE', "%$search%")
                        ->orWhere('payments.id', 'LIKE', "%$search%");
    }

}
