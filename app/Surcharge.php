<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Surcharge extends Model {

    public function quota() {
        return $this->belongsTo("App\Quota");
    }

}
