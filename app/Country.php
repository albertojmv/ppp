<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Country extends Model {

    public function customer() {
        return $this->hasMany("App\Customer");
    }
    public function scopeSearch($query, $search) {

        return $query->where('name_es','LIKE',"%$search%");
                
    }

}
