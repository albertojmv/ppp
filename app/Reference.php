<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Reference extends Model
{
   public function scopeSearch($query, $search) {

        return $query->where('customer_id', $search);
    }
    public function province() {
        return $this->belongsTo("App\Province");
    }
    public function references_type() {
        return $this->belongsTo("App\References_type");
    }
    
}
