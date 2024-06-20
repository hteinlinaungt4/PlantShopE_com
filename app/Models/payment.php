<?php

namespace App\Models;

use App\Models\Order;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class payment extends Model
{
    use HasFactory;

    protected $fillable = ['orderCode','name','phone_number','email','address','payment_method'];


    public function order()
    {
        return $this->belongsTo(Order::class, 'orderCode', 'orderCode');
    }

}
