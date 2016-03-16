<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Loan extends Model
{
    protected $dates = ['delivery'];
    protected $fillable = ['delivery'];

    //protected $dateFormat = 'U';
    
    public function paymentmethod() {
        return $this->belongsTo("App\Paymentmethod");
    }
    public function warranty() {
        return $this->belongsTo("App\Warranty");
    }
    public function calculationtype() {
        return $this->belongsTo("App\Calculationtype");
    }
    public function loanstatu() {
        return $this->belongsTo("App\Loanstatu");
    }
    public function customer() {
        return $this->belongsTo("App\Customer");
    }
    public function quota() {
        return $this->hasMany("App\Quota");
    }
   
    public function payment() {
        return $this->belongsTo("App\Payment");
    }
    public function getFecha()
    {
        $date = Carbon::parse($this->delivery)->format('d-m-Y');
        
        return $date;
    }
    
    public function scopeSearch($query, $search) {

        return $query//->join('customers', 'customers.id', '=', 'loans.customer_id')
                     ->where('id', 'LIKE', "%$search%");
               
    }
    
}
