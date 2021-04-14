<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Type extends Model
{
    protected $fillable = [
        'business_id',
        'name',
        'ingredients',
        'description',
        'price',
        'visible',
        'img',
    ];

    public function businesses() {
        return $this->belongsToMany(Business::class);
    }
}
