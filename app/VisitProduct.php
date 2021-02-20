<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class VisitProduct extends Model
{
    protected $fillable = ['product_id'];
    protected $table = 'visit_product';

    public static function getVisits($product, $date_start, $date_end) {
        return DB::select( DB::raw("SELECT count(*) as total, date(visit_product.created_at) as created_at
            FROM visit_product 
            left join product on product.id = visit_product.product_id
            left join users on users.id = product.user_id
            where product.id = ". $product ." and (date(visit_product.created_at) BETWEEN '".$date_start."' AND '".$date_end."')
            group by date(visit_product.created_at)"));
    }
}
