<?php

namespace App\Domain\Product;

use Database\Factories\CategoryFactory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Category extends Model
{
    use HasFactory;

    protected static function newFactory(): CategoryFactory
    {
        return new CategoryFactory();
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function products(int $categoryId): BelongsToMany
    {
        return $this->belongsToMany(Product::class)->wherePivot('category_id', $categoryId);
    }
}
