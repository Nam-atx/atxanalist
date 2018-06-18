<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use Illuminate\Http\Response;
use Input;
use App\Employment;
use App\empComments;
use DB;
use Session;
use Excel;
use Illuminate\Support\Facades\Validator;

class LogController extends Controller
{
  
    // admin section employment listing

    public function list(Request $request)
    {
        $sql=DB::table('system_log');
        if($request->input('name')){
            $sql->where('name','=',$request->input('name'));
           
        }
        if($request->input('type')){
            $sql->where('type','=',$request->input('type'));
            
        }
        if($request->input('message')){
            $sql->where('comment','like','%'.$request->input('message').'%');
          
        }

        $logs=$sql->paginate(10)->appends(request()->query());;


        return view('admin.log.list',['logs'=>$logs]);
    }

}
