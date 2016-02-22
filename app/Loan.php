<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Loan extends Model
{
    
    
    public function paymentmethod() {
        return $this->belongsTo("App\Paymentmethod");
    }
    public function warranty() {
        return $this->belongsTo("App\Warranty");
    }
    public function calculationtype() {
        return $this->belongsTo("App\Calculationtype");
    }
    public function loanstatu() {
        return $this->belongsTo("App\Loanstatu");
    }
}
