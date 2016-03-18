<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Province extends Model
{
  public function customer()
    {
        return $this->hasMany("App\Customer");
    }
    public function scopeSearch($query, $search) {

        return $query->where('name','LIKE',"%$search%");   
    }
}
