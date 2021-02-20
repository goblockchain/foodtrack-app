<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Process extends Model
{
    protected $table = 'process';
    protected $fillable = ['id', 'step', 'complete', 'user_id', 'product_id'];



    public static function getProcess($userId) {

        return DB::select( DB::raw("
            select profile_process.order as `orderProfile`, process.step as `orderActual`, process.id as processId, process.complete as `processComplete`, product.id as `productId`, product.name as `productName`
            from profile_process 
            left join process on process.id = profile_process.process_id
            left join product on process.product_id = product.id 
            where profile_process.user_id = '{$userId}'"
        ));
    }

    public static function checkProcessPermission($userId, $processId) {

        return DB::select( DB::raw("
            select profile_process.order as `orderProfile`, process.step as `orderActual`, process.id as processId, product.name as `productName`
            from profile_process 
            left join process on process.id = profile_process.process_id
            left join product on process.product_id = product.id 
            where profile_process.user_id = '{$userId}' and process.id = '{$processId}'"
        ));
    }

    public function product () {
        return $this->hasOne('App\ProductModel', 'id', 'product_id');
    }
}
