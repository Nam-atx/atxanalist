<?php

namespace App\Http\Controllers\Sales;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Client;
use App\clientComment;
use App\Systemlog;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use App\Traits\latlon;
class DashboardController extends Controller
{
    //

    public function index()
    {
    	$latest_count = DB::table('client')->select('client.*')->leftJoin('client_comment','client_comment.client_id','=','client.id')->whereNull('client_comment.client_id')->get()->count();
    	   return view('sales.dashboard.dashboard',['latest_count'=>$latest_count]);	
    }

     public function recentclient(Request $request)
    {
           
    	$user=Auth::user();
       
       	$now = Carbon::now();
	    $comparedate=$now->toDateString();
	  
       
       	$sql = DB::table('client')->join('client_comment', 'client_comment.client_id', '=', 'client.id')->select('client.*')->where('client_comment.user_id','=',$user->id)->where(DB::raw("(DATE_FORMAT(client_comment.created_at,'%Y-%m-%d'))"),'=',$comparedate);


      if($request->input('email')){
            $sql->where('client.email','LIKE','%'.$request->input('email').'%');
        }

        if($request->input('name')){
            $sql->where('client.name','LIKE','%'.$request->input('name').'%');
        }

        if($request->input('designation')){
            $sql->where('client.designation','LIKE','%'.$request->input('designation').'%');
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

            $sql->addselect(DB::raw("round((3959*acos(cos(radians($lat))*cos(radians(`client`.`latitude`))*cos(radians( `client`.`longitude`)-radians($lon))+sin(radians($lat))*sin(radians(`client`.`latitude`))))) AS `distance`"));
            $sql->where(DB::raw("round((3959*acos(cos(radians($lat))*cos(radians(`client`.`latitude`))*cos(radians( `client`.`longitude`)-radians($lon))+sin(radians($lat))*sin(radians(`client`.`latitude`)))))"),'<=',$request->input('radius'));

          }

         } else {

          if($request->input('city')){
              $sql->where('client.city','LIKE','%'.$request->input('city').'%');
              
           }

           if($request->input('state')){
              $sql->where('client.state','LIKE','%'.$request->input('state').'%');
              
           }

         }
        
        if($request->input('limit')){
            $limit=$request->input('limit');
        } else{
          $limit=50;
        }

        $clientsql=$sql->distinct('client.id')->groupBy('client.id')->paginate($limit);

        

        $clients=$clientsql->appends($request->query());
		//echo '<pre>'; print_r($clients); die;
        return view('sales.dashboard.recentclient',['clients'=>$clients]);
    
    }


    public function latestclient(Request $request){
        
        $user=Auth::user();
        
        $sql = DB::table('client')->select('client.*')->leftJoin('client_comment','client_comment.client_id','=','client.id')->whereNull('client_comment.client_id');

        if($request->input('email')){
            $sql->where('client.email','LIKE','%'.$request->input('email').'%');
        }

        if($request->input('name')){
            $sql->where('client.name','LIKE','%'.$request->input('name').'%');
        }

        if($request->input('designation')){
            $sql->where('client.designation','LIKE','%'.$request->input('designation').'%');
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

            $sql->addselect(DB::raw("round((3959*acos(cos(radians($lat))*cos(radians(`client`.`latitude`))*cos(radians( `client`.`longitude`)-radians($lon))+sin(radians($lat))*sin(radians(`client`.`latitude`))))) AS `distance`"));
            $sql->where(DB::raw("round((3959*acos(cos(radians($lat))*cos(radians(`client`.`latitude`))*cos(radians( `client`.`longitude`)-radians($lon))+sin(radians($lat))*sin(radians(`client`.`latitude`)))))"),'<=',$request->input('radius'));

          }

         } else {

          if($request->input('city')){
              $sql->where('client.city','LIKE','%'.$request->input('city').'%');
              
           }

           if($request->input('state')){
              $sql->where('client.state','LIKE','%'.$request->input('state').'%');
              
           }

         }

         
        if($request->input('limit')){
            $limit=$request->input('limit');
        } else{
          $limit=50;
        }


        $clientsql=$sql->paginate($limit);
        
        $clients=$clientsql->appends($request->query());

        //echo '<pre>';print_r($clients); die;

        return view('sales.dashboard.latestclient',['clients'=>$clients]);
    
    }

    public function yesterdayclient(Request $request)
    {
    	$user=Auth::user();
       
       	$now = Carbon::now()->subDays(1);

	    $comparedate=$now->toDateString();
	  
      
      	$sql = DB::table('client')->join('client_comment', 'client_comment.client_id', '=', 'client.id')->select('client.*')->where('client_comment.user_id','=',$user->id)->where(DB::raw("(DATE_FORMAT(client_comment.created_at,'%Y-%m-%d'))"),'=',$comparedate);

        if($request->input('email')){
            $sql->where('client.email','LIKE','%'.$request->input('email').'%');
        }

        if($request->input('name')){
            $sql->where('client.name','LIKE','%'.$request->input('name').'%');
        }

        if($request->input('designation')){
            $sql->where('client.designation','LIKE','%'.$request->input('designation').'%');
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

            $sql->addselect(DB::raw("round((3959*acos(cos(radians($lat))*cos(radians(`client`.`latitude`))*cos(radians( `client`.`longitude`)-radians($lon))+sin(radians($lat))*sin(radians(`client`.`latitude`))))) AS `distance`"));
            $sql->where(DB::raw("round((3959*acos(cos(radians($lat))*cos(radians(`client`.`latitude`))*cos(radians( `client`.`longitude`)-radians($lon))+sin(radians($lat))*sin(radians(`client`.`latitude`)))))"),'<=',$request->input('radius'));

          }

         } else {

          if($request->input('city')){
              $sql->where('client.city','LIKE','%'.$request->input('city').'%');
              
           }

           if($request->input('state')){
              $sql->where('client.state','LIKE','%'.$request->input('state').'%');
              
           }

         }

         if($request->input('limit')){
            $limit=$request->input('limit');
        } else{
          $limit=50;
        }

         $clientsql=$sql->distinct('client.id')->groupBy('client.id')->paginate($limit);

         //echo '<pre>'; print_r($sql); die;

         $clients=$clientsql->appends($request->query());

        return view('sales.dashboard.yesterdayclient',['clients'=>$clients]);
    
    }

   
    public function twodaybackclient(Request $request)
    {

       $user=Auth::user();
       
       $now = Carbon::now()->subDays(2);

       $comparedate=$now->toDateString();
    
       
       $sql = DB::table('client')->join('client_comment', 'client_comment.client_id', '=', 'client.id')->select('client.*')->where('client_comment.client_id','=',$user->id)->where(DB::raw("(DATE_FORMAT(client_comment.created_at,'%Y-%m-%d'))"),'=',$comparedate);

       if($request->input('email')){
            $sql->where('client.email','LIKE','%'.$request->input('email').'%');
        }

        if($request->input('name')){
            $sql->where('client.name','LIKE','%'.$request->input('name').'%');
        }

        if($request->input('designation')){
            $sql->where('client.designation','LIKE','%'.$request->input('designation').'%');
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

            $sql->addselect(DB::raw("round((3959*acos(cos(radians($lat))*cos(radians(`client`.`latitude`))*cos(radians( `client`.`longitude`)-radians($lon))+sin(radians($lat))*sin(radians(`client`.`latitude`))))) AS `distance`"));
            $sql->where(DB::raw("round((3959*acos(cos(radians($lat))*cos(radians(`client`.`latitude`))*cos(radians( `client`.`longitude`)-radians($lon))+sin(radians($lat))*sin(radians(`client`.`latitude`)))))"),'<=',$request->input('radius'));

          }

         } else {

          if($request->input('city')){
              $sql->where('client.city','LIKE','%'.$request->input('city').'%');
              
           }

           if($request->input('state')){
              $sql->where('client.state','LIKE','%'.$request->input('state').'%');
              
           }

         }


         if($request->input('limit')){
            $limit=$request->input('limit');
        } else{
          $limit=50;
        }

       $clientsql=$sql->distinct('client.id')->groupBy('client.id')->paginate($limit);

         // echo '<pre>'; print_r($sql); die;

         $clients=$clientsql->appends(request()->query());

        return view('sales.dashboard.twodaybackclient',['clients'=>$clients]);
    
    }


    public function weekclient(Request $request)
    {
       $user=Auth::user();
       
       $now = Carbon::now();

       $nowdate=$now->toDateString();

       $back = Carbon::now()->subDays(7);

       $backdate=$back->toDateString();
    
        
      	$sql = DB::table('client')->join('client_comment', 'client_comment.client_id', '=', 'client.id')->where('client_comment.user_id','=',$user->id)->select('client.*')->where(DB::raw("(DATE_FORMAT(client_comment.created_at,'%Y-%m-%d'))"),'<=',$nowdate)->where(DB::raw("(DATE_FORMAT(client_comment.created_at,'%Y-%m-%d'))"),'>=',$backdate);

      if($request->input('email')){
            $sql->where('client.email','LIKE','%'.$request->input('email').'%');
        }

        if($request->input('name')){
            $sql->where('client.name','LIKE','%'.$request->input('name').'%');
        }

        if($request->input('designation')){
            $sql->where('client.designation','LIKE','%'.$request->input('designation').'%');
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

	       $sql->addselect(DB::raw("round((3959*acos(cos(radians($lat))*cos(radians(`client`.`latitude`))*cos(radians( `client`.`longitude`)-radians($lon))+sin(radians($lat))*sin(radians(`client`.`latitude`))))) AS `distance`"));
	       $sql->where(DB::raw("round((3959*acos(cos(radians($lat))*cos(radians(`client`.`latitude`))*cos(radians( `client`.`longitude`)-radians($lon))+sin(radians($lat))*sin(radians(`client`.`latitude`)))))"),'<=',$request->input('radius'));

	    }

         } else {

          if($request->input('city')){
              $sql->where('client.city','LIKE','%'.$request->input('city').'%');
           }

           if($request->input('state')){
              $sql->where('client.state','LIKE','%'.$request->input('state').'%');
           }

         }

         if($request->input('limit')){
            $limit=$request->input('limit');
        } else{
          $limit=50;
        }

	    $clientsql=$sql->distinct('client.id')->groupBy('client.id')->paginate($limit);

      $clients=$clientsql->appends(request()->query());
        
      return view('sales.dashboard.weekclient',['clients'=>$clients]);
    }


    public function monthclient(Request $request)
    {
       $user=Auth::user();
       
       $now = Carbon::now();

       $nowdate=$now->toDateString();

       $back = Carbon::now()->subMonths(1);

       $backdate=$back->toDateString();

    
      $sql = DB::table('client')->join('client_comment', 'client_comment.client_id', '=', 'client.id')->select('client.*')->where(DB::raw("(DATE_FORMAT(client_comment.created_at,'%Y-%m-%d'))"),'<=',$nowdate)->where(DB::raw("(DATE_FORMAT(client_comment.created_at,'%Y-%m-%d'))"),'>=',$backdate);

      if($request->input('email')){
            $sql->where('client.email','LIKE','%'.$request->input('email').'%');
        }

        if($request->input('name')){
            $sql->where('client.name','LIKE','%'.$request->input('name').'%');
        }

        if($request->input('designation')){
            $sql->where('client.designation','LIKE','%'.$request->input('designation').'%');
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

            $sql->addselect(DB::raw("round((3959*acos(cos(radians($lat))*cos(radians(`client`.`latitude`))*cos(radians( `client`.`longitude`)-radians($lon))+sin(radians($lat))*sin(radians(`client`.`latitude`))))) AS `distance`"));
            $sql->where(DB::raw("round((3959*acos(cos(radians($lat))*cos(radians(`client`.`latitude`))*cos(radians( `client`.`longitude`)-radians($lon))+sin(radians($lat))*sin(radians(`client`.`latitude`)))))"),'<=',$request->input('radius'));

          }

         } else {

          if($request->input('city')){
              $sql->where('client.city','LIKE','%'.$request->input('city').'%');
              
           }

           if($request->input('state')){
              $sql->where('client.state','LIKE','%'.$request->input('state').'%');
              
           }

         }

      if($request->input('limit')){
            $limit=$request->input('limit');
        } else{
          $limit=50;
        }

      $clientsql=$sql->distinct('client.id')->groupBy('client.id')->paginate($limit);

         // echo '<pre>'; print_r($sql); die;

         $clients=$clientsql->appends(request()->query());

        return view('sales.dashboard.monthclient',['clients'=>$clients]);
    
    }


    public function yearclient(Request $request)
    {
       $user=Auth::user();
       
       $now = Carbon::now();

       $nowdate=$now->toDateString();

       $back = Carbon::now()->subDays(365);

       $backdate=$back->toDateString();
    
      
       $sql = DB::table('client')->join('client_comment', 'client_comment.client_id', '=', 'client.id')->select('client.*')->where(DB::raw("(DATE_FORMAT(client_comment.created_at,'%Y-%m-%d'))"),'<=',$nowdate)->where(DB::raw("(DATE_FORMAT(client_comment.created_at,'%Y-%m-%d'))"),'>=',$backdate);

       if($request->input('email')){
            $sql->where('client.email','LIKE','%'.$request->input('email').'%');
        }

        if($request->input('name')){
            $sql->where('client.name','LIKE','%'.$request->input('name').'%');
        }

        if($request->input('designation')){
            $sql->where('client.designation','LIKE','%'.$request->input('designation').'%');
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

            $sql->addselect(DB::raw("round((3959*acos(cos(radians($lat))*cos(radians(`client`.`latitude`))*cos(radians( `client`.`longitude`)-radians($lon))+sin(radians($lat))*sin(radians(`client`.`latitude`))))) AS `distance`"));
            $sql->where(DB::raw("round((3959*acos(cos(radians($lat))*cos(radians(`client`.`latitude`))*cos(radians( `client`.`longitude`)-radians($lon))+sin(radians($lat))*sin(radians(`client`.`latitude`)))))"),'<=',$request->input('radius'));

          }

         } else {

          if($request->input('city')){
              $sql->where('client.city','LIKE','%'.$request->input('city').'%');
              
           }

           if($request->input('state')){
              $sql->where('client.state','LIKE','%'.$request->input('state').'%');
              
           }

         }

         if($request->input('limit')){
            $limit=$request->input('limit');
        } else{
          $limit=50;
        }

       $clientsql=$sql->distinct('client.id')->groupBy('client.id')->paginate($limit);

         // echo '<pre>'; print_r($sql); die;

       $clients=$clientsql->appends(request()->query());

       return view('sales.dashboard.yearclient',['clients'=>$clients]);
    
    }


}
