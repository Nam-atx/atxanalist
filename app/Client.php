<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    //

    protected $table = 'client';
    protected $fillable = [
        'name', 'contact','designation', 'phone','fax','email','contact_1','designation_1', 'phone_1','email_1','contact_2','designation_2', 'phone_2','email_2','city','state','zipcode','requirement','status','opening_date','longitude','latitude'
    ];

}
