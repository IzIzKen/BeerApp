<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Feeling extends Model
{
    use HasFactory;

    public function beerFeelings()
    {
        return $this->hasMany(beerFeeling::class);
    }
}
