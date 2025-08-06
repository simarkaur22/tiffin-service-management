<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    use HasFactory;

      public function tiffins()
    {
        return $this->hasMany(Tiffin::class);
    }


    public function payments()
    {
        return $this->hasMany(CustomerPayment::class);
    }
}
