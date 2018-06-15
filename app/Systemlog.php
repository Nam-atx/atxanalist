<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Systemlog extends Model
{
    //
    protected $table = 'system_log';
    protected $fillable = ['user_id', 'name','type', 'comment'];
}
