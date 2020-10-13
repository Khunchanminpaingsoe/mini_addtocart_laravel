<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $table = 'products';
    protected $fillable = [
        'categoryName','productName','productCode','details','image',
    ];

    public function category(){
                return $this->belongsTo('App\Category', 'categoryName', 'id');
    }
}
