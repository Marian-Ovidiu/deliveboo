<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Business;

class Type extends Model
{
    public function businesses() {
        return $this->belongsToMany(Business::class);
    }
}
