<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Product;

class Order extends Model
{

  protected $fillable = [
      'customer_name',
      'customer_last_name',
      'customer_email',
      'customer_telephone',
      'customer_address',
      'city',
      'postal_code',
      'notes',
      'amount',
      'success',
  ];

  public function products() {
      return $this->belongsToMany(Product::class);
  }
}
