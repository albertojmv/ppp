<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Customer extends Model {
    
    protected $date = ['birthdate'];
    protected $fillable = ['birthdate'];

    //protected $dateFormat = 'U';

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
    
    public function getFecha()
    {
        $date = Carbon::parse($this->birthdate)->format('d-m-Y');
        
        return $date;
    }
    public function loan() {
        return $this->hasMany("App\Loan");
    }
    
     public function scopeSearch($query, $search) {

      
        return $query->where('name', 'LIKE', "%$search%")
                ->orWhere('lastname','LIKE',"%$search%")
                ->orWhere('cedula','LIKE',"%$search%");
    }

}
