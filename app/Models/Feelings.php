<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Feelings extends Model
{
    use HasFactory;

    public function beers()
    {
        return $this->belongsToMany(Beers::class);
    }
}
