<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Customer extends Model {

    public function country() {
        return $this->belongsTo("App\Country");
    }

    public function province() {
        return $this->belongsTo("App\Province");
    }

    public function civilstatu() {
        return $this->belongsTo("App\Civilstatu");
    }

    public function gender() {
        return $this->belongsTo("App\Gender");
    }

}
