<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Kyslik\ColumnSortable\Sortable;

class Template extends Model 
{
  
    protected $table = 'template';
    protected $fillable = ['user_id', 'template_name','message'];

}

