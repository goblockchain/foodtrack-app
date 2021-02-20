<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class OriginTransport extends Model
{
    protected $table = 'origin_transport';
    protected $fillable = ['id', 'name_driver', 'cargo_destination', 'zip_code', 'address', 'state', 'number', 'complement', 'neighborhood', 'date', 'user_id', 'process_id'];
}
