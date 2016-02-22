<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Paymentmethod extends Model
{
    public function loan() {
        return $this->hasMany("App\Loan");
    }
}
