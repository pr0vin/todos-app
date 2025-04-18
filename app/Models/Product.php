<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    //
    protected $guarded = ['id'];


    public function product_category()
    {
        return $this->belongsTo(Category::class, 'category_id');
    }
}
