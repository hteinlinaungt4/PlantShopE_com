<?php

namespace App\Models;

use App\Models\payment;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Order extends Model
{
    use HasFactory;
        // If 'ordercode' is not the primary key, you can specify it here
        protected $primaryKey = 'orderCode';

        // If 'ordercode' is not auto-incrementing
        public $incrementing = false;

        // If 'ordercode' is not an integer
        protected $keyType = 'string';

    protected $fillable=['user_id','orderCode','total_price','status'];

    public function orderLists()
    {
        return $this->hasMany(OrderList::class, 'orderCode', 'orderCode');
    }


    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function payment()
    {
        return $this->hasOne(payment::class, 'orderCode', 'orderCode');
    }
}
