<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class IndustryProcess extends Model
{
    protected $table = 'industry_process';
    protected $fillable = ['id', 'date_validity', 'user_id', 'process_id'];
}
