<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Business;
use App\Order;

class Product extends Model
{
    protected $fillable = [
        'name',
        'business_id',
        'ingredients',
        'description',
        'price',
        'visible',
        'img',
    ];

    public function businesses()
    {
      return $this->belongsTo(Business::class);
    }

    public function orders() {
        return $this->belongsToMany(Order::class);
    }
}
