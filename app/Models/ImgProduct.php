<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ImgProduct extends Model
{
    protected $table='image_product';
    public $timestamps = false; 
    public function product(){
    	return $this->belongsTo('App\Models\Products','id','product_id');
    }
}
