<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use DB;

class Loanapplication extends Model {

    protected $fillable = ['vehicle', 'home'];

    public function civilstatu() {
        return $this->belongsTo("App\Civilstatu");
    }

    public function scopeSearch($query, $search) {


        return $query->where(DB::raw("CONCAT(name,' ',lastname)"), 'LIKE', "%$search%")
                        ->orWhere('cedula', 'LIKE', "%$search%");
    }

    public function getVehiculo() {
        if ($this->vehicle == 0) {
            return "No";
        } else {
            return "Si";
        }
    }

    public function getVivienda() {
        if ($this->home == 0) {
            return "Alquilada";
        } else {
            return "Propia";
        }
    }

}
