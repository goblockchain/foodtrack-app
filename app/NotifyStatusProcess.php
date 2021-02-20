<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class NotifyStatusProcess extends Model
{
    protected $table = 'notify_status_process';
    protected $fillable = ['message', 'process_id'];
}
