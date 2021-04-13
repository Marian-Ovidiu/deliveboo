<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\User;
use App\Type;
use App\Product;

class Business extends Model
{
    public function user()
    {
      return $this->belongsTo(User::class);
    }

    public function types() {
        return $this->belongsToMany(Type::class);
    }

    public function products() {
        return $this->hasMany(Product::class);
    }
}
