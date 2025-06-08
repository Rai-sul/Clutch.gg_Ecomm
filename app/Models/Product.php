<?php


namespace App\Models;

use Illuminate\Database\Eloquent\Model;


class Product extends Model
{
    // Relationship: A product has many images
    public function images()
    {
        return $this->hasMany(ProductImages::class);
    }
}