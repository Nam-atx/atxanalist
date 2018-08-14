<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class clientComment extends Model
{
    //

     protected $table = 'client_comment';
     protected $fillable = ['user_id', 'client_id', 'comment','status','type'];
}
