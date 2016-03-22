<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Contact extends Model {

    public function scopeSearch($query, $search) {

        return $query->where('name', 'LIKE', "%$search%")
                ->orWhere('email','LIKE',"%$search%")
                ->orWhere('message','LIKE',"%$search%");
    }

}
