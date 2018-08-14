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
use App\Traits\latlon;
class DashboardController extends Controller
{
   use latlon;

   public function __construct()
    {
        $this->middleware('auth');
    }

  protected $address='';

   public function dashboard(){

        
        $latest_count = DB::table('employment')->select('employment.id','first_name')->leftJoin('emp_comments','emp_comments.emp_id','=','employment.id')->whereNull('emp_comments.emp_id')->get()->count();
    	   return view('user.employment.dashboard',['latest_count'=>$latest_count]);
   }


    public function latestresume(Request $request){
        
        $user=Auth::user();
        
        $sql = DB::table('employment')->select('employment.*')->leftJoin('emp_comments','emp_comments.emp_id','=','employment.id')->whereNull('emp_comments.emp_id');

        if($request->input('position')){
            $sql->where('employment.position','LIKE','%'.$request->input('position').'%');
         }

         if($request->input('radius')){

           if($request->input('city')){
              $this->address.=','.$request->input('city');
           }

           if($request->input('state')){
              $this->address.=','.$request->input('state');
           }

          if(!empty($this->address)){
            
            $this->address=ltrim($this->address,',');
            $getinfo=$this->getlatlon($this->address);
            
            $lat=$getinfo['latitude'];
            $lon=$getinfo['longitude'];

            $sql->addselect(DB::raw("round((3959*acos(cos(radians($lat))*cos(radians(`employment`.`latitude`))*cos(radians( `employment`.`longitude`)-radians($lon))+sin(radians($lat))*sin(radians(`employment`.`latitude`))))) AS `distance`"));
            $sql->where(DB::raw("round((3959*acos(cos(radians($lat))*cos(radians(`employment`.`latitude`))*cos(radians( `employment`.`longitude`)-radians($lon))+sin(radians($lat))*sin(radians(`employment`.`latitude`)))))"),'<=',$request->input('radius'));

          }

         } else {

          if($request->input('city')){
              $sql->where('employment.city','LIKE','%'.$request->input('city').'%');
              
           }

           if($request->input('state')){
              $sql->where('employment.state','LIKE','%'.$request->input('state').'%');
              
           }

         }

         
        $empsql=$sql->paginate(5);
        
        $employments=$empsql->appends($request->query());

        //echo '<pre>';print_r($employments); die;

        return view('user.employment.latestresume',['employments'=>$employments]);
    
    }



    public function recentresume(Request $request)
    {
           
    	 $user=Auth::user();
       
       $now = Carbon::now();
	     $comparedate=$now->toDateString();
	  
       
       $sql = DB::table('employment')->join('emp_comments', 'emp_comments.emp_id', '=', 'employment.id')->select('employment.*')->where('emp_comments.user_id','=',$user->id)->where(DB::raw("(DATE_FORMAT(emp_comments.created_at,'%Y-%m-%d'))"),'=',$comparedate);


       if($request->input('position')){
          $sql->where('employment.position','LIKE','%'.$request->input('position').'%');
       }

       if($request->input('radius')){

           if($request->input('city')){
              $this->address.=','.$request->input('city');
           }

           if($request->input('state')){
              $this->address.=','.$request->input('state');
           }

          if(!empty($this->address)){
            
            $this->address=ltrim($this->address,',');
            $getinfo=$this->getlatlon($this->address);
            
            $lat=$getinfo['latitude'];
            $lon=$getinfo['longitude'];

            $sql->addselect(DB::raw("round((3959*acos(cos(radians($lat))*cos(radians(`employment`.`latitude`))*cos(radians( `employment`.`longitude`)-radians($lon))+sin(radians($lat))*sin(radians(`employment`.`latitude`))))) AS `distance`"));
            $sql->where(DB::raw("round((3959*acos(cos(radians($lat))*cos(radians(`employment`.`latitude`))*cos(radians( `employment`.`longitude`)-radians($lon))+sin(radians($lat))*sin(radians(`employment`.`latitude`)))))"),'<=',$request->input('radius'));

          }

         } else {

          if($request->input('city')){
              $sql->where('employment.city','LIKE','%'.$request->input('city').'%');
              
           }

           if($request->input('state')){
              $sql->where('employment.state','LIKE','%'.$request->input('state').'%');
              
           }

         }

       $empsql=$sql->distinct('employment.id')->groupBy('employment.id')->paginate(5);

        //echo '<pre>'; print_r($sql); die;

         $employments=$empsql->appends($request->query());

        return view('user.employment.recentresume',['employments'=>$employments]);
    
    }


    public function yesterdayresume(Request $request)
    {
    	 $user=Auth::user();
       
       $now = Carbon::now()->subDays(1);

	     $comparedate=$now->toDateString();
	  
      
      $sql = DB::table('employment')->join('emp_comments', 'emp_comments.emp_id', '=', 'employment.id')->select('employment.*')->where('emp_comments.user_id','=',$user->id)->where(DB::raw("(DATE_FORMAT(emp_comments.created_at,'%Y-%m-%d'))"),'=',$comparedate);

      if($request->input('position')){
          $sql->where('employment.position','LIKE','%'.$request->input('position').'%');
       }

       if($request->input('radius')){

           if($request->input('city')){
              $this->address.=','.$request->input('city');
           }

           if($request->input('state')){
              $this->address.=','.$request->input('state');
           }

          if(!empty($this->address)){
            
            $this->address=ltrim($this->address,',');
            $getinfo=$this->getlatlon($this->address);
            
            $lat=$getinfo['latitude'];
            $lon=$getinfo['longitude'];

            $sql->addselect(DB::raw("round((3959*acos(cos(radians($lat))*cos(radians(`employment`.`latitude`))*cos(radians( `employment`.`longitude`)-radians($lon))+sin(radians($lat))*sin(radians(`employment`.`latitude`))))) AS `distance`"));
            $sql->where(DB::raw("round((3959*acos(cos(radians($lat))*cos(radians(`employment`.`latitude`))*cos(radians( `employment`.`longitude`)-radians($lon))+sin(radians($lat))*sin(radians(`employment`.`latitude`)))))"),'<=',$request->input('radius'));

          }

         } else {

          if($request->input('city')){
              $sql->where('employment.city','LIKE','%'.$request->input('city').'%');
              
           }

           if($request->input('state')){
              $sql->where('employment.state','LIKE','%'.$request->input('state').'%');
              
           }

         }

         $empsql=$sql->distinct('employment.id')->groupBy('employment.id')->paginate(5);

         //echo '<pre>'; print_r($sql); die;

         $employments=$empsql->appends($request->query());

        return view('user.employment.yesterdayresume',['employments'=>$employments]);
    
    }



    public function twodaybackresume(Request $request)
    {

       $user=Auth::user();
       
       $now = Carbon::now()->subDays(2);

       $comparedate=$now->toDateString();
    
       
       $sql = DB::table('employment')->join('emp_comments', 'emp_comments.emp_id', '=', 'employment.id')->select('employment.*')->where('emp_comments.user_id','=',$user->id)->where(DB::raw("(DATE_FORMAT(emp_comments.created_at,'%Y-%m-%d'))"),'=',$comparedate);

       if($request->input('position')){
          $sql->where('employment.position','LIKE','%'.$request->input('position').'%');
       }

       if($request->input('radius')){

           if($request->input('city')){
              $this->address.=','.$request->input('city');
           }

           if($request->input('state')){
              $this->address.=','.$request->input('state');
           }

          if(!empty($this->address)){
            
            $this->address=ltrim($this->address,',');
            $getinfo=$this->getlatlon($this->address);
            
            $lat=$getinfo['latitude'];
            $lon=$getinfo['longitude'];

            $sql->addselect(DB::raw("round((3959*acos(cos(radians($lat))*cos(radians(`employment`.`latitude`))*cos(radians( `employment`.`longitude`)-radians($lon))+sin(radians($lat))*sin(radians(`employment`.`latitude`))))) AS `distance`"));
            $sql->where(DB::raw("round((3959*acos(cos(radians($lat))*cos(radians(`employment`.`latitude`))*cos(radians( `employment`.`longitude`)-radians($lon))+sin(radians($lat))*sin(radians(`employment`.`latitude`)))))"),'<=',$request->input('radius'));

          }

         } else {

          if($request->input('city')){
              $sql->where('employment.city','LIKE','%'.$request->input('city').'%');
              
           }

           if($request->input('state')){
              $sql->where('employment.state','LIKE','%'.$request->input('state').'%');
              
           }

         }

       $empsql=$sql->distinct('employment.id')->groupBy('employment.id')->paginate(5);

         // echo '<pre>'; print_r($sql); die;

         $employments=$empsql->appends(request()->query());

        return view('user.employment.twodaybackresume',['employments'=>$employments]);
    
    }


     public function weekresume(Request $request)
    {


       $user=Auth::user();
       
       $now = Carbon::now();

       $nowdate=$now->toDateString();

       $back = Carbon::now()->subDays(7);

        $backdate=$back->toDateString();
    
        
      $sql = DB::table('employment')->join('emp_comments', 'emp_comments.emp_id', '=', 'employment.id')->where('emp_comments.user_id','=',$user->id)->select('employment.*')->where(DB::raw("(DATE_FORMAT(emp_comments.created_at,'%Y-%m-%d'))"),'<=',$nowdate)->where(DB::raw("(DATE_FORMAT(emp_comments.created_at,'%Y-%m-%d'))"),'>=',$backdate);

      if($request->input('position')){
          $sql->where('employment.position','LIKE','%'.$request->input('position').'%');
       }

       if($request->input('radius')){

           if($request->input('city')){
              $this->address.=','.$request->input('city');
           }

           if($request->input('state')){
              $this->address.=','.$request->input('state');
           }

          if(!empty($this->address)){
            
            $this->address=ltrim($this->address,',');
            $getinfo=$this->getlatlon($this->address);
            
            $lat=$getinfo['latitude'];
            $lon=$getinfo['longitude'];

            $sql->addselect(DB::raw("round((3959*acos(cos(radians($lat))*cos(radians(`employment`.`latitude`))*cos(radians( `employment`.`longitude`)-radians($lon))+sin(radians($lat))*sin(radians(`employment`.`latitude`))))) AS `distance`"));
            $sql->where(DB::raw("round((3959*acos(cos(radians($lat))*cos(radians(`employment`.`latitude`))*cos(radians( `employment`.`longitude`)-radians($lon))+sin(radians($lat))*sin(radians(`employment`.`latitude`)))))"),'<=',$request->input('radius'));

          }

         } else {

          if($request->input('city')){
              $sql->where('employment.city','LIKE','%'.$request->input('city').'%');
              
           }

           if($request->input('state')){
              $sql->where('employment.state','LIKE','%'.$request->input('state').'%');
              
           }

         }

       $empsql=$sql->distinct('employment.id')->groupBy('employment.id')->paginate(5);

        //echo '<pre>'; print_r($numbers); die;
         $employments=$empsql->appends(request()->query());
        
        return view('user.employment.weekresume',['employments'=>$employments]);
    }

     public function monthresume(Request $request)
    {
       $user=Auth::user();
       
       $now = Carbon::now();

       $nowdate=$now->toDateString();

       $back = Carbon::now()->subDays(30);

       $backdate=$back->toDateString();

    
      $sql = DB::table('employment')->join('emp_comments', 'emp_comments.emp_id', '=', 'employment.id')->select('employment.*')->where(DB::raw("(DATE_FORMAT(emp_comments.created_at,'%Y-%m-%d'))"),'<=',$nowdate)->where(DB::raw("(DATE_FORMAT(emp_comments.created_at,'%Y-%m-%d'))"),'>=',$backdate);

      if($request->input('position')){
          $sql->where('employment.position','LIKE','%'.$request->input('position').'%');
       }

       if($request->input('radius')){

           if($request->input('city')){
              $this->address.=','.$request->input('city');
           }

           if($request->input('state')){
              $this->address.=','.$request->input('state');
           }

          if(!empty($this->address)){
            
            $this->address=ltrim($this->address,',');
            $getinfo=$this->getlatlon($this->address);
            
            $lat=$getinfo['latitude'];
            $lon=$getinfo['longitude'];

            $sql->addselect(DB::raw("round((3959*acos(cos(radians($lat))*cos(radians(`employment`.`latitude`))*cos(radians( `employment`.`longitude`)-radians($lon))+sin(radians($lat))*sin(radians(`employment`.`latitude`))))) AS `distance`"));
            $sql->where(DB::raw("round((3959*acos(cos(radians($lat))*cos(radians(`employment`.`latitude`))*cos(radians( `employment`.`longitude`)-radians($lon))+sin(radians($lat))*sin(radians(`employment`.`latitude`)))))"),'<=',$request->input('radius'));

          }

         } else {

          if($request->input('city')){
              $sql->where('employment.city','LIKE','%'.$request->input('city').'%');
              
           }

           if($request->input('state')){
              $sql->where('employment.state','LIKE','%'.$request->input('state').'%');
              
           }

         }

      $empsql=$sql->distinct('employment.id')->groupBy('employment.id')->paginate(5);

         // echo '<pre>'; print_r($sql); die;

         $employments=$empsql->appends(request()->query());

        return view('user.employment.monthresume',['employments'=>$employments]);
    
    }

     public function yearresume(Request $request)
    {
       $user=Auth::user();
       
       $now = Carbon::now();

       $nowdate=$now->toDateString();

       $back = Carbon::now()->subDays(365);

       $backdate=$back->toDateString();
    
      
       $sql = DB::table('employment')->join('emp_comments', 'emp_comments.emp_id', '=', 'employment.id')->select('employment.*')->where(DB::raw("(DATE_FORMAT(emp_comments.created_at,'%Y-%m-%d'))"),'<=',$nowdate)->where(DB::raw("(DATE_FORMAT(emp_comments.created_at,'%Y-%m-%d'))"),'>=',$backdate);

       if($request->input('position')){
          $sql->where('employment.position','LIKE','%'.$request->input('position').'%');
       }

       if($request->input('radius')){

           if($request->input('city')){
              $this->address.=','.$request->input('city');
           }

           if($request->input('state')){
              $this->address.=','.$request->input('state');
           }

          if(!empty($this->address)){
            
            $this->address=ltrim($this->address,',');
            $getinfo=$this->getlatlon($this->address);
            
            $lat=$getinfo['latitude'];
            $lon=$getinfo['longitude'];

            $sql->addselect(DB::raw("round((3959*acos(cos(radians($lat))*cos(radians(`employment`.`latitude`))*cos(radians( `employment`.`longitude`)-radians($lon))+sin(radians($lat))*sin(radians(`employment`.`latitude`))))) AS `distance`"));
            $sql->where(DB::raw("round((3959*acos(cos(radians($lat))*cos(radians(`employment`.`latitude`))*cos(radians( `employment`.`longitude`)-radians($lon))+sin(radians($lat))*sin(radians(`employment`.`latitude`)))))"),'<=',$request->input('radius'));

          }

         } else {

          if($request->input('city')){
              $sql->where('employment.city','LIKE','%'.$request->input('city').'%');
              
           }

           if($request->input('state')){
              $sql->where('employment.state','LIKE','%'.$request->input('state').'%');
              
           }

         }

       $empsql=$sql->distinct('employment.id')->groupBy('employment.id')->paginate(5);

         // echo '<pre>'; print_r($sql); die;

       $employments=$empsql->appends(request()->query());

       return view('user.employment.yearresume',['employments'=>$employments]);
    
    }




}
