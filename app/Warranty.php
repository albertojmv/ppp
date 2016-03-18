<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Warranty extends Model
{
    public function loan() {
        return $this->hasMany("App\Loan");
    }
    
    public function warranty_detail() {
        return $this->hasMany("App\Warranty_detail");
    }
    public function scopeSearch($query, $search) {

        return $query->where('name','LIKE',"%$search%");   
    }
}
