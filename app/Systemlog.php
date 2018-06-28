<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Kyslik\ColumnSortable\Sortable;

class Systemlog extends Model 
{
  
    protected $table = 'system_log';
    protected $fillable = ['user_id', 'name','type', 'comment','last_login_at',
        'last_login_ip',];

    public $sortable = ['name', 'type','created_at','updated_at'];

}

