<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Quota extends Model
{
   public function quotastatu() {
        return $this->belongsTo("App\Quotastatu");
    }
    
    public function getFecha()
    {
        $date = Carbon::parse($this->dateexpiration)->format('d-m-Y');
        
        return $date;
    }
}
