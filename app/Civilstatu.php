<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Civilstatu extends Model {

    public function customer() {
        return $this->hasMany("App\Customer");
    }
    public function loanapplication() {
        return $this->hasMany("App\Loanapplication");
    }

}
