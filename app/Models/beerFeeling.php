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
            //気分と温度の検索時
            if (array_key_exists('feeling_id', $queryParams) && !is_null($queryParams['feeling_id']) && array_key_exists('deepness', $queryParams) && array_key_exists('strength', $queryParams)) {
                $join->where('feeling_id', '=', $queryParams['feeling_id'])
                    ->where('deepness', '>=', $queryParams['deepness'])
                    ->where('strength', '>=', $queryParams['strength']);
            }
            //気分のみの検索時
            if (array_key_exists('feeling_id', $queryParams) && !is_null($queryParams['feeling_id'])) {
                $join->where('feeling_id', '=', $queryParams['feeling_id']);
            }
            //温度のみの検索時
            if (array_key_exists('deepness', $queryParams) && array_key_exists('strength', $queryParams)) {
                $join->where('deepness', '>=', $queryParams['deepness'])
                    ->where('strength', '>=', $queryParams['strength']);
            }
        });

        return $query;
    }
}
