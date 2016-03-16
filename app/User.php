<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable {
    
    protected $table = 'users';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'username', 'password', 'role_id',
    ];

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function role() {
        return $this->belongsTo("App\Role");
    }
    public function state() {
        return $this->belongsTo("App\State");
    }
    public function payment() {
        return $this->hasMany("App\Payment");
    }
    public function loan() {
        return $this->hasMany("App\Loan");
    }
    public function customer() {
        return $this->hasMany("App\Customer");
    }
    
     public function setPasswordAttribute($valor){
        if(!empty($valor)){
            $this->attributes['password'] = \Hash::make($valor);
        }
     }

}
