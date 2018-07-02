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

        if($request->input('created_at')){
            $sql->where('created_at','like','%'.$request->input('created_at').'%');
          
        }
        if ($request->input('sort')){
            if($request->input('orderby')){
                $sql->orderby($request->input('sort'),$request->input('orderby'));
            }
            else {
                $sql->orderby($request->input('sort'),'asc');
            }

            
        }
      // echo '<pre>';
       // print_r($request->all());
        $logs=$sql->paginate(10)->appends(request()->query());;

        return view('admin.log.list',['logs'=>$logs]);
    }

}


