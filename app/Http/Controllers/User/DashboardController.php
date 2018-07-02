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



    public function recentresume()
    {
           
    	 $user=Auth::user();
       
      $now = Carbon::now();
	 $comparedate=$now->toDateString();
	  
      $numbers= DB::table('employment')->join('emp_comments', 'emp_comments.emp_id', '=', 'employment.id')->where('emp_comments.user_id','=',$user->id)->where(DB::raw("(DATE_FORMAT(emp_comments.created_at,'%Y-%m-%d'))"),'>=',$comparedate)->count();
      $sql = DB::table('employment')->join('emp_comments', 'emp_comments.emp_id', '=', 'employment.id')->where('emp_comments.user_id','=',$user->id)->where(DB::raw("(DATE_FORMAT(emp_comments.created_at,'%Y-%m-%d'))"),'>=',$comparedate)->take(1)->paginate(5);

         // echo '<pre>'; print_r($sql); die;

         $employments=$sql->appends(request()->query());

        return view('user.employment.recentresume',['employments'=>$employments],compact('numbers'));
    
    }


    public function yesterdayresume()
    {
    	 $user=Auth::user();
       
       $now = Carbon::now()->subDays(1);

	     $comparedate=$now->toDateString();
	  
     $numbers= DB::table('employment')->join('emp_comments', 'emp_comments.emp_id', '=', 'employment.id')->where('emp_comments.user_id','=',$user->id)->where(DB::raw("(DATE_FORMAT(emp_comments.created_at,'%Y-%m-%d'))"),'>=',$comparedate)->count();
      $sql = DB::table('employment')->join('emp_comments', 'emp_comments.emp_id', '=', 'employment.id')->where('emp_comments.user_id','=',$user->id)->where(DB::raw("(DATE_FORMAT(emp_comments.created_at,'%Y-%m-%d'))"),'>=',$comparedate)->take(1)->paginate(5);

         // echo '<pre>'; print_r($sql); die;

         $employments=$sql->appends(request()->query());

        return view('user.employment.recentresume',['employments'=>$employments],compact('numbers'));
    
    }



     public function twodaybackresume()
    {

       $user=Auth::user();
       
       $now = Carbon::now()->subDays(2);

   $comparedate=$now->toDateString();
    
      $numbers= DB::table('employment')->join('emp_comments', 'emp_comments.emp_id', '=', 'employment.id')->where('emp_comments.user_id','=',$user->id)->where(DB::raw("(DATE_FORMAT(emp_comments.created_at,'%Y-%m-%d'))"),'>=',$comparedate)->count();
      $sql = DB::table('employment')->join('emp_comments', 'emp_comments.emp_id', '=', 'employment.id')->where('emp_comments.user_id','=',$user->id)->where(DB::raw("(DATE_FORMAT(emp_comments.created_at,'%Y-%m-%d'))"),'>=',$comparedate)->take(1)->paginate(5);

         // echo '<pre>'; print_r($sql); die;

         $employments=$sql->appends(request()->query());

        return view('user.employment.recentresume',['employments'=>$employments],compact('numbers'));
    
    }


     public function weekresume()
    {


       $user=Auth::user();
       
       $now = Carbon::now()->subDays(7);

   $comparedate=$now->toDateString();
    
    $numbers= DB::table('employment')->join('emp_comments', 'emp_comments.emp_id', '=', 'employment.id')->where('emp_comments.user_id','=',$user->id)->where(DB::raw("(DATE_FORMAT(emp_comments.created_at,'%Y-%m-%d'))"),'>=',$comparedate)->count();
      $sql = DB::table('employment')->join('emp_comments', 'emp_comments.emp_id', '=', 'employment.id')->where('emp_comments.user_id','=',$user->id)->where(DB::raw("(DATE_FORMAT(emp_comments.created_at,'%Y-%m-%d'))"),'>=',$comparedate)->take(1)->paginate(5);

         // echo '<pre>'; print_r($sql); die;

         $employments=$sql->appends(request()->query());

        return view('user.employment.recentresume',['employments'=>$employments],compact('numbers'));
    
    }

     public function monthresume()
    {
       $user=Auth::user();
       
      $now = Carbon::now()->subDays(30);


      $comparedate=$now->toDateString();
    
     $numbers= DB::table('employment')->join('emp_comments', 'emp_comments.emp_id', '=', 'employment.id')->where('emp_comments.user_id','=',$user->id)->where(DB::raw("(DATE_FORMAT(emp_comments.created_at,'%Y-%m-%d'))"),'>=',$comparedate)->count();
      $sql = DB::table('employment')->join('emp_comments', 'emp_comments.emp_id', '=', 'employment.id')->where('emp_comments.user_id','=',$user->id)->where(DB::raw("(DATE_FORMAT(emp_comments.created_at,'%Y-%m-%d'))"),'>=',$comparedate)->take(1)->paginate(5);

         // echo '<pre>'; print_r($sql); die;

         $employments=$sql->appends(request()->query());

        return view('user.employment.recentresume',['employments'=>$employments],compact('numbers'));
    
    }

     public function yearresume()
    {
       $user=Auth::user();
       
       $now = Carbon::now()->subDays(365);

   $comparedate=$now->toDateString();
    
     $numbers= DB::table('employment')->join('emp_comments', 'emp_comments.emp_id', '=', 'employment.id')->where('emp_comments.user_id','=',$user->id)->where(DB::raw("(DATE_FORMAT(emp_comments.created_at,'%Y-%m-%d'))"),'>=',$comparedate)->count();
      $sql = DB::table('employment')->join('emp_comments', 'emp_comments.emp_id', '=', 'employment.id')->where('emp_comments.user_id','=',$user->id)->where(DB::raw("(DATE_FORMAT(emp_comments.created_at,'%Y-%m-%d'))"),'>=',$comparedate)->take(1)->paginate(5);

         // echo '<pre>'; print_r($sql); die;

         $employments=$sql->appends(request()->query());

        return view('user.employment.recentresume',['employments'=>$employments],compact('numbers'));
    
    }


    public function latestresume(){
         

         $user=Auth::user();

         



$employments=$latest->request()->query();

 return view('user.employment.latestresume',['employments'=>$employments],compact('latest'));
         


    }


}
