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
        $query->select('*', 'feelings.name as feeling_name', 'beers.name as beer_name', 'styles.name as style_name', 'breweries.name as brewery_name');

        $query->join('feelings', function (JoinClause $join) {
            $join->on('feelings.id', '=', 'beer_feeling.feeling_id');
        });

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

        $query->join('styles', function (JoinClause $join) {
            $join->on('styles.id', '=', 'beers.style_id');
        });

        $query->join('breweries', function (JoinClause $join) {
            $join->on('breweries.id', '=', 'beers.brewery_id');
        });



        return $query;
    }
}
