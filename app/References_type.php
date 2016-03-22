<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class References_type extends Model
{
   public function reference()
    {
        return $this->hasMany("App\Reference");
    }
}
