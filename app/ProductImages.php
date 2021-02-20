<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProductImages extends Model
{
    protected $table = 'product_images';
    protected $fillable = ['id', 'name', 'product_id'];


    public function product() {
        return $this->hasOne("App\Models\Product", 'id', 'product_id');
    }
}
