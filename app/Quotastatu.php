<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Quotastatu extends Model
{
   public function quota() {
        return $this->hasMany("App\Quota");
    }
}
