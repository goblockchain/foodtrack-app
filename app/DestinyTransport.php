<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DestinyTransport extends Model
{
    protected $table = 'destiny_transport';
    protected $fillable = ['id', 'cargo_destination', 'zip_code', 'address', 'number', 'state', 'complement', 'neighborhood', 'date', 'user_id', 'process_id'];
}
