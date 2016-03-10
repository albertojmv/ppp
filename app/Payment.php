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

      
        return $query->where('notes', "LIKE", "%$id%");
    }

}
