<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Products;
class Products extends Model
{
    protected $table = 'products';
    // public $timestamps = false;
    public function brands()
    {
        return $this->belongsTo('App\Models\Brands', 'brands_id');
    }
    public function imageProduct()
    {
        return $this->hasMany('App\Models\ImgProduct', 'products_id', 'id');
    }
    
    public function infoProduct()
    {
        return $this->hasOne('App\Models\Info_product', 'products_id', 'id');
    }
    public function avatar()
    {
        return $this->hasOne('App\Models\ImgProduct', 'products_id', 'id')
                    ->where('level', 1)->first();
    }
    
    // public function inforProduct()
    // {
    //     return $this->hasOne('App\Models\Info_product',  'products_id','id');
    // }
}