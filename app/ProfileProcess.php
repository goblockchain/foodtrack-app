<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProfileProcess extends Model
{
    protected $table = 'profile_process';
    protected $fillable = ['id', 'user_id', 'status', 'order', 'process_id'];

    public function user () {
        return $this->belongsTo('App\User', 'user_id', 'id');
    }
}
