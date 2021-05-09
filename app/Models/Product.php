<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    public function hascategory($categoryes)
    {
        return in_array($categoryes, $this->categoryes->pluck('id')->toArray());
    }

    public function categoryes()
    {
        return $this->belongsToMany(Category::class, 'product_categories');
    }
}
