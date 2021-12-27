<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\Pivot;
use Illuminate\Database\Query\JoinClause;

class beerFeeling extends Pivot
{
    use HasFactory;

    public function beer()
    {
        return $this->belongsTo(Beer::class);
    }

    public function feeling()
    {
        return $this->belongsTo(Feeling::class);
    }

    public function scopeSearch($query, $queryParams)
    {
        $query->join('beers', function (JoinClause $join) use ($queryParams) {
            $join->on('beers.id', '=', 'beer_feeling.beer_id');
            if (array_key_exists('bitterness', $queryParams) && !is_null($queryParams['bitterness'])) {
                $join->where('beers.bitterness', '>', $queryParams['bitterness']);
            }

            $join->where('feeling_id', $queryParams['feeling_id']);

        });

        return $query;
    }
}
