<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
   public function formofpayment() {
        return $this->belongsTo("App\Formofpayment");
    }
    
    public function quota() {
        return $this->belongsTo("App\Quota");
    }
    
     public function loan() {
        return $this->hasMany("App\Loan");
    }
    
    
}
