<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

use Illuminate\Database\Eloquent\Factories\HasFactory;

class Order extends Model
{
    use HasFactory;
    protected $fillable = ['customer_name', 'email', 'phone', 'address', 'del_zone', 'del_charge'];


    public function orderDetails()
    {
        return $this->hasMany(OrderDetail::class);
    }


}

