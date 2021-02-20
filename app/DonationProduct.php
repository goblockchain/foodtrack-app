<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DonationProduct extends Model
{
    protected $table = 'donation_product';
    protected $fillable = ['type', 'product_id'];
}
