<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    //

    protected $table = 'client';
    protected $fillable = [
        'name', 'contact', 'phone','fax','email','city','state','zipcode','requirement','status','opening_date','longitude','latitude'
    ];

}
