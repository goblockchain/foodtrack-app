<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


class ProductModel extends Model
{
    protected $table = 'product';

    protected $fillable = ['id', 'name', 'temperature', 'description', 'organic', 'user_id'];

    public function images () {
        return $this->hasMany('App\ProductImages', 'product_id', 'id');
    }

    public function donation () {
        return $this->hasOne('App\DonationProduct', 'product_id', 'id');
    }
}
