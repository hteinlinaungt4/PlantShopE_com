<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

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
}
