<?php

namespace App\Http\Controllers\User;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Http\Response;
use App\Employment;
use App\empComments;
use App\Systemlog;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class DashboardController extends Controller
{
   
    public function dashboard(){

      $latest_count = DB::table('employment')->select('employment.id','first_name')
        ->leftJoin('emp_comments','emp_comments.emp_id','=','employment.id')
        ->whereNull('emp_comments.emp_id')
        ->get()
        ->count();

    	return view('user.employment.dashboard',['latest_count'=>$latest_count]);
    }


    public function latestresume(){
         

         $user=Auth::user();

      $sql = DB::table('employment')->select('employment.id','first_name')
        ->leftJoin('emp_comments','emp_comments.emp_id','=','employment.id')
        ->whereNull('emp_comments.emp_id')
        ->paginate(5);


 $employments=$sql->appends(request()->query());

        return view('user.employment.recentresume',['employments'=>$employments]);
    
    }



    public function recentresume()
    {
           
    	 $user=Auth::user();
       
       $now = Carbon::now();
	     $comparedate=$now->toDateString();
	  
       
       $sql = DB::table('employment')->join('emp_comments', 'emp_comments.emp_id', '=', 'employment.id')->select('employment.*')->where('emp_comments.user_id','=',$user->id)->where(DB::raw("(DATE_FORMAT(emp_comments.created_at,'%Y-%m-%d'))"),'=',$comparedate)->distinct('employment.id')->groupBy('employment.id')->paginate(5);

         // echo '<pre>'; print_r($sql); die;

         $employments=$sql->appends(request()->query());

        return view('user.employment.recentresume',['employments'=>$employments]);
    
    }


    public function yesterdayresume()
    {
    	 $user=Auth::user();
       
       $now = Carbon::now()->subDays(1);

	     $comparedate=$now->toDateString();
	  
      
      $sql = DB::table('employment')->join('emp_comments', 'emp_comments.emp_id', '=', 'employment.id')->select('employment.*')->where('emp_comments.user_id','=',$user->id)->where(DB::raw("(DATE_FORMAT(emp_comments.created_at,'%Y-%m-%d'))"),'=',$comparedate)->distinct('employment.id')->groupBy('employment.id')->paginate(5);

         // echo '<pre>'; print_r($sql); die;

         $employments=$sql->appends(request()->query());

        return view('user.employment.yesterdayresume',['employments'=>$employments]);
    
    }



    public function twodaybackresume()
    {

       $user=Auth::user();
       
       $now = Carbon::now()->subDays(2);

       $comparedate=$now->toDateString();
    
       
       $sql = DB::table('employment')->join('emp_comments', 'emp_comments.emp_id', '=', 'employment.id')->select('employment.*')->where('emp_comments.user_id','=',$user->id)->where(DB::raw("(DATE_FORMAT(emp_comments.created_at,'%Y-%m-%d'))"),'=',$comparedate)->distinct('employment.id')->groupBy('employment.id')->paginate(5);

         // echo '<pre>'; print_r($sql); die;

         $employments=$sql->appends(request()->query());

        return view('user.employment.twodaybackresume',['employments'=>$employments]);
    
    }


     public function weekresume()
    {


       $user=Auth::user();
       
       $now = Carbon::now();

       $nowdate=$now->toDateString();

       $back = Carbon::now()->subDays(7);

        $backdate=$back->toDateString();
    
        
      $sql = DB::table('employment')->join('emp_comments', 'emp_comments.emp_id', '=', 'employment.id')->where('emp_comments.user_id','=',$user->id)->select('employment.*')->where(DB::raw("(DATE_FORMAT(emp_comments.created_at,'%Y-%m-%d'))"),'<=',$nowdate)->where(DB::raw("(DATE_FORMAT(emp_comments.created_at,'%Y-%m-%d'))"),'>=',$backdate)->distinct('employment.id')->groupBy('employment.id')->paginate(5);

        //echo '<pre>'; print_r($numbers); die;
         $employments=$sql->appends(request()->query());
        
        return view('user.employment.weekresume',['employments'=>$employments]);
    }

     public function monthresume()
    {
       $user=Auth::user();
       
       $now = Carbon::now();

       $nowdate=$now->toDateString();

       $back = Carbon::now()->subDays(30);

       $backdate=$back->toDateString();

    
      $sql = DB::table('employment')->join('emp_comments', 'emp_comments.emp_id', '=', 'employment.id')->select('employment.*')->where(DB::raw("(DATE_FORMAT(emp_comments.created_at,'%Y-%m-%d'))"),'<=',$nowdate)->where(DB::raw("(DATE_FORMAT(emp_comments.created_at,'%Y-%m-%d'))"),'>=',$backdate)->distinct('employment.id')->groupBy('employment.id')->paginate(5);

         // echo '<pre>'; print_r($sql); die;

         $employments=$sql->appends(request()->query());

        return view('user.employment.monthresume',['employments'=>$employments]);
    
    }

     public function yearresume()
    {
       $user=Auth::user();
       
       $now = Carbon::now();

       $nowdate=$now->toDateString();

       $back = Carbon::now()->subDays(365);

       $backdate=$back->toDateString();
    
      
       $sql = DB::table('employment')->join('emp_comments', 'emp_comments.emp_id', '=', 'employment.id')->select('employment.*')->where(DB::raw("(DATE_FORMAT(emp_comments.created_at,'%Y-%m-%d'))"),'<=',$nowdate)->where(DB::raw("(DATE_FORMAT(emp_comments.created_at,'%Y-%m-%d'))"),'>=',$backdate)->distinct('employment.id')->groupBy('employment.id')->paginate(5);

         // echo '<pre>'; print_r($sql); die;

       $employments=$sql->appends(request()->query());

       return view('user.employment.yearresume',['employments'=>$employments]);
    
    }




}
