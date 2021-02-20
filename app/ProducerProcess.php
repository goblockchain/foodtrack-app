<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProducerProcess extends Model
{
    protected $table = 'producer_process';
    protected $fillable = ['id', 'planting_s', 'planting_f', 'fertilizer_s', 'fertilizer_f', 'harvest_s', 'harvest_f', 'herbicide_s', 'herbicide_f', 'process_id', 'user_id'];
}
