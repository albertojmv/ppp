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

    public function loan() {
        return $this->hasMany("App\Loan");
    }

    public function scopeId($query, $id) {

      
        return $query->join('quotas', 'quotas.id', '=', 'payments.quota_id')
                ->where('quotas.loan_id', 'LIKE', "%$id%");
                //->orWhere('payments.id','LIKE',"%$id%");
    }

}
