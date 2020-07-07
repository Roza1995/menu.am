<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    public function order(){
        return $this->hasOne('App\Product');
    }
}
