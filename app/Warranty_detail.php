<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Warranty_detail extends Model
{
    public function warranty() {
        return $this->belongsTo("App\Warranty");
    }
    
    
    public function scopeSearch($query, $search) {

        return $query->where('loan_id', 'LIKE', "%$search%");
               
    }
}
