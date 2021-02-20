<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class LaboratoryProcess extends Model
{
    protected $table = 'laboratory_process';
    protected $fillable = ['id', 'test', 'process_id', 'user_id'];
}
