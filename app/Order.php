<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $fillable = ['order_number', 'user_id', 'status', 'grand_total', 'item_count', 'is_paid', 'payment_method', 'billing_fullname', 'billing_address', 'billing_address2', 'billing_city', 'billing_email', 'billing_phone', 'notes'];


    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function products()
    {
        return $this->belongsToMany(Product::class, 'order_product', 'order_id', 'product_id')->withPivot('quantity', 'price');
    }
    
}
