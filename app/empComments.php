<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class empComments extends Model
{
    //

    protected $table = 'emp_comments';
    protected $fillable = ['user_id', 'emp_id', 'comment'];

}
