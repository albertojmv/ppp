<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
   public function formofpayment() {
        return $this->belongsTo("App\Formofpayment");
    }
}
