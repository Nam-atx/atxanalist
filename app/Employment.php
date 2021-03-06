<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Kyslik\ColumnSortable\Sortable;

class Employment extends Model
{
    //employment

    protected $table = 'employment';
    protected $fillable = [
        'application_date','title', 'first_name', 'last_name','email','phone','cell_number','best_time_to_call','street1','street2','city','state','zipcode','country','position','days_available','license','need_call','resume','email_status','longitude','latitude','source'
    ];

}