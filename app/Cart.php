<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    function relation_to_product_table()
    {
      return $this->hasOne('App\Product', 'id', 'product_id');
    }
    function relation_to_color_table()
    {
      return $this->hasOne('App\Color', 'id', 'color_id');
    }
}
