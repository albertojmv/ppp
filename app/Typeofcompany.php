<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Typeofcompany extends Model {

    public function income() {
        return $this->hasMany("App\Income");
    }

}
