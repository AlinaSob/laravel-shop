<?php

namespace App\Utilities\ProductFilters;

use App\Utilities\FilterContract;
use Illuminate\Database\Eloquent\Builder;

class City implements FilterContract
{
    protected $query;

    public function __construct(Builder $query)
    {
        $this->query = $query;
    }

    public function handle($value): void
    {
        $this->query->whereHas('cities', function($q) use($value) {
            $q->whereIn('city_id', $value);
        });
    }
}
