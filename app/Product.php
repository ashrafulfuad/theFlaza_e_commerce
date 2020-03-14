<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Product extends Model
{
    use SoftDeletes;
    protected $fillable = ['product_name', 'product_description', 'product_price', 'product_quantity', 'alert_quantity', 'product_photo'];
    function relation_to_category_table()
    {
      return $this->hasOne('App\Category', 'id', 'category_id');
    }
}
