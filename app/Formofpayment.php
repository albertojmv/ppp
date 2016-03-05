<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Formofpayment extends Model
{
   public function payment() {
        return $this->hasMany("App\Payment");
    }
}
