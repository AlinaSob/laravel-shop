<?php

namespace App\Domain\Product;

use Database\Factories\CityFactory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class City extends Model
{
    use HasFactory;

    protected static function newFactory(): CityFactory
    {
        return new CityFactory();
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function products($cityId): BelongsToMany
    {

        return $this->belongsToMany(Product::class)->wherePivotIn('city_id', $cityId);
    }
}
