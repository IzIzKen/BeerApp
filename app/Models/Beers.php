<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Beers extends Model
{
    use HasFactory;

    public function burewery()
    {
        return $this->belongsTo(Breweries::class);
    }

    public function style()
    {
        return $this->belongsTo(Styles::class);
    }

    public function feelings()
    {
        return $this->belongsToMany(Feelings::class);
    }
}
