<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;


class Product extends Model
{
     public function categories()       // названия использовать такие же, как название таблиц
    {
        return $this->belongsTo(Category::class, 'category_id');
    }
}
