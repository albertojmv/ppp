<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Calculationtype extends Model
{
    public function loan() {
        return $this->hasMany("App\Loan");
    }
}
