<?php


namespace System\Cart\Model;

use Illuminate\Database\Eloquent\Model;
use System\Classified\Model\Classified;

class Order extends Model
{
    protected $fillable = ['user_id', 'is_pay', 'order_name', 'order_email', 'order_mobile', 'order_address',
        'receiver_name', 'receiver_address', 'receiver_mobile'];

    public function totalPrice()
    {
        $total_price = 0;

        foreach($this->details as $detail) {
            $total_price += ($detail->price * $detail->quantity);
        }

        return $total_price;
    }

    public function classifieds()
    {
        return $this->belongsToMany(Classified::class, 'order_details', 'order_id', 'classified_id')
            ->withPivot(['quantity', 'price'])
            ->withTimestamps();
    }

    public function details()
    {
        return $this->hasMany(OrderDetail::class);
    }
}