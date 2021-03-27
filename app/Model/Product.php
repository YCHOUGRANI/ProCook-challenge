<?php

namespace App\Model;

use Illuminate\Support\Facades\App;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{

    protected $primaryKey = 'product_id';
    protected $fillable = array('product_desc', 'product_name', 'product_name_fr', 'product_price', 'category_id');
    public function category()
    {
        return $this->belongsTo(Category::class, 'category_id', 'id');
    }
    /*public function getProductName($value)
    {
        $locale = App::currentLocale();
        if (App::isLocale('en')) {
            return $this->product_name_fr;
        }
        return $value;
    }*/
}
