<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Income extends Model {

    public function scopeSearch($query, $search) {

        return $query->where('customer_id', $search);
    }
    
    public function typeofcompany() {
        return $this->belongsTo("App\Typeofcompany");
    }

}
