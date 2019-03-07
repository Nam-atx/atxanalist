<?php

namespace App\Http\Controllers\User;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Http\Response;
use App\Employment;
use App\empComments;
use App\Systemlog;
use App\User;
use App\Client;
use App\clientComment;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Mail\sendEmail;
use Illuminate\Support\Facades\Mail;
use App\Traits\latlon;
use App\Template;
use Carbon\Carbon;
class UserController extends Controller
{


    use latlon;
     /**
     * Create a new controller instance.
     *
     * @return void
     */
     protected $address='';

     protected $limit=50;

    public function __construct()
    {
        $this->middleware('auth');
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        //
        $string='';

        $user=Auth::user();
//DB::enableQueryLog();
        $sql=DB::table('employment')->select('employment.*');

        //$sql=DB::table('employment')->leftJoin('emp_comments', 'employment.id', '=', 'emp_comments.emp_id')->select('employment.*')->where('emp_comments.comment', '<>', '')->groupBy('application_date');

        if($request->input('email')){
            $sql->where('email','LIKE','%'.$request->input('email').'%');
            $string.=',email='.$request->input('email');
        }

        if($request->input('position')){
            $sql->where('position','LIKE','%'.$request->input('position').'%');
            $string.=',postion='.$request->input('position');
        }
        


        if($request->input('radius')){

           if($request->input('city')){
              $this->address.=','.$request->input('city');
              $string.=',city='.$request->input('city');
           }

           if($request->input('state')){
              $this->address.=','.$request->input('state');
              $string.=',state='.$request->input('state');
           }

          if(!empty($this->address)){
            
            $this->address=ltrim($this->address,',');
            $getinfo=$this->getlatlon($this->address);
            
            $latlong=Employment::where('city',$request->input('city'))->where('state',$request->input('state'))->first();

            if(!empty($latlong->latitude) && !empty($latlong->longitude)){
              
              $lat=$latlong->latitude;        
              $lon=$latlong->longitude;
            
              $sql->addselect(DB::raw("round((3959*acos(cos(radians($lat))*cos(radians(`employment`.`latitude`))*cos(radians( `employment`.`longitude`)-radians($lon))+sin(radians($lat))*sin(radians(`employment`.`latitude`))))) AS `distance`"));
              $sql->where(DB::raw("round((3959*acos(cos(radians($lat))*cos(radians(`employment`.`latitude`))*cos(radians( `employment`.`longitude`)-radians($lon))+sin(radians($lat))*sin(radians(`employment`.`latitude`)))))"),'<=',$request->input('radius'));
            }
            else{ 

                return redirect()->route('home')->with('errmsg', 'No such data are available in this search criteria in our database.'); 
                 
            }
          }

         } else {

          if($request->input('city')){
              $sql->where('employment.city','LIKE','%'.$request->input('city').'%');
              
               $string.=',city='.$request->input('city');
              
           }

           if($request->input('state')){
              $sql->where('employment.state','LIKE','%'.$request->input('state').'%');
              $string.=',state='.$request->input('state');
           }

         }

        if($string){
            $data=['user_id'=>$user->id,'name'=>$user->name,'type'=>'search','comment'=>'search by '.$user->name. '=>'.$string,'ip_address'=>$request->ip()];
            Systemlog::create($data);
        }

        if($request->input('from_date')){
          $sql->where('employment.application_date','>=',$request->input('from_date'));
        }
         

        if($request->input('to_date')){
          $sql->where('employment.application_date','<=',$request->input('to_date'));
        }

        if($request->input('limit')){
            $this->limit=$request->input('limit');
        }

        $empsql=$sql->orderBy('employment.application_date', 'desc')->paginate($this->limit);

        $employments=$empsql->appends($request->query());
        
        //$employments=Employment::paginate(5);

        $allrequest=array();
        foreach($request->all() as $key=>$value)
        {
          $allrequest[$key]=urldecode($value);
        }

        $employments->appends($allrequest)->links();

        return view('user.employment.index',['employments'=>$employments]);

    }

    

    public function atxemployees(Request $request)
    {  
        //
        $string='';

        $user=Auth::user();

        $sql=DB::table('employment')->select('employment.*')->where('employment.atxemployee','=',1);

        if($request->input('email')){
            $sql->where('email','LIKE','%'.$request->input('email').'%');
            $string.=',email='.$request->input('email');
        }

        if($request->input('position')){
            $sql->where('position','LIKE','%'.$request->input('position').'%');
            $string.=',postion='.$request->input('position');
        }
        


        if($request->input('radius')){

           if($request->input('city')){
              $this->address.=','.$request->input('city');
              $string.=',city='.$request->input('city');
           }

           if($request->input('state')){
              $this->address.=','.$request->input('state');
              $string.=',state='.$request->input('state');
           }

          if(!empty($this->address)){
            
            $this->address=ltrim($this->address,',');
            $getinfo=$this->getlatlon($this->address);
            
            $latlong=Employment::where('city',$request->input('city'))->where('state',$request->input('state'))->first();
            $lat=$latlong->latitude;
            $lon=$latlong->longitude;

            $sql->addselect(DB::raw("round((3959*acos(cos(radians($lat))*cos(radians(`employment`.`latitude`))*cos(radians( `employment`.`longitude`)-radians($lon))+sin(radians($lat))*sin(radians(`employment`.`latitude`))))) AS `distance`"));
            $sql->where(DB::raw("round((3959*acos(cos(radians($lat))*cos(radians(`employment`.`latitude`))*cos(radians( `employment`.`longitude`)-radians($lon))+sin(radians($lat))*sin(radians(`employment`.`latitude`)))))"),'<=',$request->input('radius'));

          }

         } else {

          if($request->input('city')){
              $sql->where('employment.city','LIKE','%'.$request->input('city').'%');
              
               $string.=',city='.$request->input('city');
              
           }

           if($request->input('state')){
              $sql->where('employment.state','LIKE','%'.$request->input('state').'%');
              $string.=',state='.$request->input('state');
           }

         }

        if($string){
            $data=['user_id'=>$user->id,'name'=>$user->name,'type'=>'search','comment'=>'search by '.$user->name. '=>'.$string,'ip_address'=>$request->ip()];
            Systemlog::create($data);
        }

        if($request->input('from_date')){
          $sql->where('employment.application_date','>=',$request->input('from_date'));
        }
         

        if($request->input('to_date')){
          $sql->where('employment.application_date','<=',$request->input('to_date'));
        }

        if($request->input('limit')){
            $this->limit=$request->input('limit');
        }

        $empsql=$sql->orderBy('employment.application_date', 'desc')->paginate($this->limit);

        $employments=$empsql->appends($request->query());
        
        //$employments=Employment::paginate(5);

        $allrequest=array();
        foreach($request->all() as $key=>$value)
        {
          $allrequest[$key]=urldecode($value);
        }

        $employments->appends($allrequest)->links();

        return view('user.employment.atxemployees',['employments'=>$employments]);

    }



    public function atxavailables(Request $request)
    {  
        //
        $string='';

        $user=Auth::user();

        $sql=DB::table('employment')->select('employment.*')->where('employment.atxavailable','=',1);

        if($request->input('email')){
            $sql->where('email','LIKE','%'.$request->input('email').'%');
            $string.=',email='.$request->input('email');
        }

        if($request->input('position')){
            $sql->where('position','LIKE','%'.$request->input('position').'%');
            $string.=',postion='.$request->input('position');
        }
        


        if($request->input('radius')){

           if($request->input('city')){
              $this->address.=','.$request->input('city');
              $string.=',city='.$request->input('city');
           }

           if($request->input('state')){
              $this->address.=','.$request->input('state');
              $string.=',state='.$request->input('state');
           }

          if(!empty($this->address)){
            
            $this->address=ltrim($this->address,',');
            $getinfo=$this->getlatlon($this->address);
            
            $latlong=Employment::where('city',$request->input('city'))->where('state',$request->input('state'))->first();
            $lat=$latlong->latitude;
            $lon=$latlong->longitude;

            $sql->addselect(DB::raw("round((3959*acos(cos(radians($lat))*cos(radians(`employment`.`latitude`))*cos(radians( `employment`.`longitude`)-radians($lon))+sin(radians($lat))*sin(radians(`employment`.`latitude`))))) AS `distance`"));
            $sql->where(DB::raw("round((3959*acos(cos(radians($lat))*cos(radians(`employment`.`latitude`))*cos(radians( `employment`.`longitude`)-radians($lon))+sin(radians($lat))*sin(radians(`employment`.`latitude`)))))"),'<=',$request->input('radius'));

          }

         } else {

          if($request->input('city')){
              $sql->where('employment.city','LIKE','%'.$request->input('city').'%');
              
               $string.=',city='.$request->input('city');
              
           }

           if($request->input('state')){
              $sql->where('employment.state','LIKE','%'.$request->input('state').'%');
              $string.=',state='.$request->input('state');
           }

         }

        if($string){
            $data=['user_id'=>$user->id,'name'=>$user->name,'type'=>'search','comment'=>'search by '.$user->name. '=>'.$string,'ip_address'=>$request->ip()];
            Systemlog::create($data);
        }

        if($request->input('from_date')){
          $sql->where('employment.application_date','>=',$request->input('from_date'));
        }
         

        if($request->input('to_date')){
          $sql->where('employment.application_date','<=',$request->input('to_date'));
        }

        if($request->input('limit')){
            $this->limit=$request->input('limit');
        }

        $empsql=$sql->orderBy('employment.application_date', 'desc')->paginate($this->limit);

        $employments=$empsql->appends($request->query());
        
        //$employments=Employment::paginate(5);

        $allrequest=array();
        foreach($request->all() as $key=>$value)
        {
          $allrequest[$key]=urldecode($value);
        }

        $employments->appends($allrequest)->links();

        return view('user.employment.atxavailables',['employments'=>$employments]);

    }    



    public function dnd(Request $request){

        $mytime = \Carbon\Carbon::now();
        

        $employment=Employment::find($request->input('emp_id'));

        $employment->dnd=1;
        $employment->dnd_date=$mytime->toDateTimeString();

        $employment->save();

        return redirect()->route('emp.show',$request->input('emp_id'))->with('message','Employment has been updated successfully');
    }

  public function nondnd(Request $request){

         $employment=Employment::find($request->input('emp_id'));

         $employment->dnd=0;
         $employment->dnd_date=NULL;
         $employment->save();
        
          return redirect()->route('emp.show',$request->input('emp_id'))->with('message','Employment has been updated successfully');
     }


    public function atxemployee(Request $request){

            $user=Auth::user();

            $mytime = \Carbon\Carbon::now();
            

            $employment=Employment::find($request->input('emp_id'));

            $employment->atxemployee=1;
            $employment->atxemployee_date=$mytime->toDateTimeString();
            $employment->atxemployee_user=$user->id;

            $employment->save();

            return redirect()->route('emp.show',$request->input('emp_id'))->with('message','Employment has been updated successfully');
        }

      public function nonatxemployee(Request $request){

             $user=Auth::user();    
             $employment=Employment::find($request->input('emp_id'));

             $employment->atxemployee=0;
             $employment->atxemployee_date=NULL;
             $employment->atxemployee_user=0;
             $employment->save();
            
              return redirect()->route('emp.show',$request->input('emp_id'))->with('message','Employment has been updated successfully');
         }


         public function atxavailable(Request $request){

            $user=Auth::user();

            $mytime = \Carbon\Carbon::now();
            

            $employment=Employment::find($request->input('emp_id'));

            $employment->atxavailable=1;
            $employment->atxavailable_date=$mytime->toDateTimeString();
            $employment->atxavailable_user=$user->id;

            $employment->save();

            return redirect()->route('emp.show',$request->input('emp_id'))->with('message','Lead has been updated successfully');
        }

      public function nonatxavailable(Request $request){

             $user=Auth::user();    
             $employment=Employment::find($request->input('emp_id'));

             $employment->atxavailable=0;
             $employment->atxavailable_date=NULL;
             $employment->atxavailable_user=0;
             $employment->save();
            
              return redirect()->route('emp.show',$request->input('emp_id'))->with('message','Lead has been updated successfully');
         }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id,Request $request)
    {
        //
        $sales=User::where('is_admin','=',3)->where('status','=',1)->get();

        
        $user=Auth::user();
        $employment=Employment::find($id);

        if($request->input('empstatus')=='available'){
            $presql=Employment::where('employment.atxavailable','=',1)->where('id', '<', $id);
        }
        else if($request->input('empstatus')=='employee'){
            $presql=Employment::where('employment.atxemployee','=',1)->where('id', '<', $id);
        }
        else{
            $presql=Employment::where('id', '<', $id);
        }    

        if($request->input('position')){
            $presql->where('position','LIKE','%'.$request->input('position').'%');
        }
        if($request->input('city')){
            $presql->where('city','LIKE','%'.$request->input('city').'%');
        }

        if($request->input('state')){
            $presql->where('state','LIKE','%'.$request->input('state').'%');
        }

        if($request->input('email')){
            $presql->where('email','LIKE','%'.$request->input('email').'%');
        }


        if($request->input('from_date')){
          $presql->where('employment.application_date','>=',$request->input('from_date'));
        }
         

        if($request->input('to_date')){
          $presql->where('employment.application_date','<=',$request->input('to_date'));
        }


        if($request->input('city') && $request->input('state') && $request->input('radius')){
            $latlong=Employment::where('city',$request->input('city'))->where('state',$request->input('state'))->first();
            $lat=$latlong->latitude;
            $lon=$latlong->longitude;

            $presql->addselect(DB::raw("round((3959*acos(cos(radians($lat))*cos(radians(`employment`.`latitude`))*cos(radians( `employment`.`longitude`)-radians($lon))+sin(radians($lat))*sin(radians(`employment`.`latitude`))))) AS `distance`"));
            $presql->where(DB::raw("round((3959*acos(cos(radians($lat))*cos(radians(`employment`.`latitude`))*cos(radians( `employment`.`longitude`)-radians($lon))+sin(radians($lat))*sin(radians(`employment`.`latitude`)))))"),'<=',$request->input('radius'));
        }


        $previous = $presql->orderBy('employment.application_date', 'desc')->max('id');

        if($request->input('empstatus')=='available'){
            $nextsql=Employment::where('employment.atxavailable','=',1)->where('id', '>', $id);
        } 
        else if($request->input('empstatus')=='employee'){
            $nextsql=Employment::where('employment.atxemployee','=',1)->where('id', '>', $id);
        }
        else{
            $nextsql=Employment::where('id', '>', $id);
        }    

        if($request->input('position')){
            $nextsql->where('position','LIKE','%'.$request->input('position').'%');
        }
        if($request->input('city')){
            $nextsql->where('city','LIKE','%'.$request->input('city').'%');
        }

        if($request->input('state')){
            $nextsql->where('state','LIKE','%'.$request->input('state').'%');
        }

        if($request->input('email')){
            $nextsql->where('email','LIKE','%'.$request->input('email').'%');
        }
        

        if($request->input('from_date')){
          $nextsql->where('employment.application_date','>=',$request->input('from_date'));
        }
         

        if($request->input('to_date')){
          $nextsql->where('employment.application_date','<=',$request->input('to_date'));
        }


        if($request->input('city') && $request->input('state') && $request->input('radius')){
            $latlong=Employment::where('city',$request->input('city'))->where('state',$request->input('state'))->first();
            $lat=$latlong->latitude;
            $lon=$latlong->longitude;

            $nextsql->addselect(DB::raw("round((3959*acos(cos(radians($lat))*cos(radians(`employment`.`latitude`))*cos(radians( `employment`.`longitude`)-radians($lon))+sin(radians($lat))*sin(radians(`employment`.`latitude`))))) AS `distance`"));
            $nextsql->where(DB::raw("round((3959*acos(cos(radians($lat))*cos(radians(`employment`.`latitude`))*cos(radians( `employment`.`longitude`)-radians($lon))+sin(radians($lat))*sin(radians(`employment`.`latitude`)))))"),'<=',$request->input('radius'));
        }


        $next = $nextsql->orderBy('employment.application_date', 'desc')->min('id');


        //$next = Employment::where('id', '>', $id)->min('id');

        $empcomments = DB::table('users')
            ->join('emp_comments', 'emp_comments.user_id', '=', 'users.id')
            ->select('users.id','users.name','emp_comments.comment',DB::raw('DATE_FORMAT(emp_comments.created_at, "%d %b %Y %r") as created_at'))->where('emp_comments.emp_id','=',$id)->get();

        // echo '<pre>';print_r($empcomments);die();
        
        $data=['user_id'=>$user->id,'name'=>$user->name,'type'=>'view','comment'=>'viewed by '.$user->name,'ip_address'=>$request->ip()];

        Systemlog::create($data);


        $templates=DB::table('template')->where('user_id','=',$user->id)->get();

        $latestTemplate = Template::where('user_id','=',$user->id)->orderBy('id', 'desc')->first();


        return view('user.employment.show',['previous'=>$previous,'next'=>$next,'employement'=>$employment,'empcomments'=>$empcomments,'sales'=>$sales,'templates'=>$templates,'latestTemplate'=>$latestTemplate]);

    }

    public function saveComment(Request $request, $id){
        $user=Auth::user();
        $data=['user_id'=>$user->id,'emp_id'=>$id,'comment'=>$request->input('comment')];

        empComments::create($data);

        $emp=Employment::find($id);
        $emp->future_followup_date=$request->input('future_followup_date');
        $emp->followup_user=$user->id;
        $emp->save();
        //$results=empComments::where('emp_id',$id)->get();

        $results = DB::table('users')->join('emp_comments', 'users.id', '=', 'emp_comments.user_id')->where('emp_comments.emp_id',$id)->select('users.name', 'emp_comments.emp_id', 'emp_comments.comment', DB::raw('DATE_FORMAT(emp_comments.created_at, "%d %b %Y %r") as created_at'))->get();

        return response()->json(['data' => $results,'status' => Response::HTTP_OK]); 
    }



    public function todayfollowup(Request $request){
        $user=Auth::user();
        $now = Carbon::now();
        $comparedate=$now->toDateString();

        $sql=Employment::where(DB::raw("(DATE_FORMAT(employment.future_followup_date,'%Y-%m-%d'))"),'=',$comparedate)->where('followup_user',$user->id);

        if($request->input('email')){
            $sql->where('employment.email','LIKE','%'.$request->input('email').'%');
        }

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
            
            $latlong=Employment::where('city',$request->input('city'))->where('state',$request->input('state'))->first();
            $lat=$latlong->latitude;
            $lon=$latlong->longitude;

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

        if($request->input('from_date')){
          $sql->where('employment.application_date','>=',$request->input('from_date'));
        }
         

        if($request->input('to_date')){
          $sql->where('employment.application_date','<=',$request->input('to_date'));
        }

         
        if($request->input('limit')){
            $this->limit=$request->input('limit');
        }

        $employments=$sql->paginate($this->limit);
        return view('user.employment.todayfollowup',['employments'=>$employments]);
    }


    public function futurefollowup(Request $request){
        $user=Auth::user();
        $now = Carbon::now();
        $comparedate=$now->toDateString();

        $sql=Employment::where(DB::raw("(DATE_FORMAT(employment.future_followup_date,'%Y-%m-%d'))"),'>',$comparedate)->where('followup_user',$user->id);

        if($request->input('email')){
            $sql->where('employment.email','LIKE','%'.$request->input('email').'%');
        }

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
            
            $latlong=Employment::where('city',$request->input('city'))->where('state',$request->input('state'))->first();
            $lat=$latlong->latitude;
            $lon=$latlong->longitude;

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

        if($request->input('from_date')){
          $sql->where('employment.application_date','>=',$request->input('from_date'));
        }
         

        if($request->input('to_date')){
          $sql->where('employment.application_date','<=',$request->input('to_date'));
        }

         
        if($request->input('limit')){
            $this->limit=$request->input('limit');
        }

        $employments=$sql->paginate($this->limit);
        return view('user.employment.futurefollowup',['employments'=>$employments]);
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function employeeupdate(Request $request, $id){

        $employment=Employment::find($id);

        if($request->input('title')){
            $employment->title=$request->input('title');
        }
        if($request->input('first_name')){
            $employment->first_name=$request->input('first_name');
        }

        if($request->input('last_name')){
            $employment->last_name=$request->input('last_name');
        }
        if($request->input('email')){
            $employment->email=$request->input('email');
        }

        if($request->input('phone')){
            $employment->phone=$request->input('phone');
        }

        if($request->input('cell_number')){
            $employment->cell_number=$request->input('cell_number');
        }

        if($request->input('best_time_to_call')){
            $employment->best_time_to_call=$request->input('best_time_to_call');
        }

        if($request->input('street1')){
            $employment->street1=$request->input('street1');
        }
        if($request->input('street2')){
            $employment->street2=$request->input('street2');
        }

        if($request->input('city')){
            $employment->city=$request->input('city');
        }
        if($request->input('state')){
            $employment->state=$request->input('state');
        }

        if($request->input('zipcode')){
            $employment->zipcode=$request->input('zipcode');
        }
        if($request->input('country')){
            $employment->country=$request->input('country');
        }
        if($request->input('position')){
            $employment->position=$request->input('position');
        }
        if($request->input('days_available')){
            $employment->days_available=implode(' ',$request->input('days_available'));
        }

        if($request->input('license')){
            $employment->license=$request->input('license');
        }

        if($request->input('need_call')){
            $employment->need_call=$request->input('need_call');
        }
        if($request->input('resume')){
            $employment->resume=$request->input('resume');
        }
        if($request->input('source')){
            $employment->source=$request->input('source');
        }

        $employment->save();

    }


    public function updaterequired($id, Request $request)
    {
        $employment=Employment::find($id);
        $employment->update_required=1;
        $employment->save();
    }

    public function loginhistory(Request $request){

        $user=Auth::user();

        $logsql=Systemlog::where('user_id','=',$user->id);


        if($request->input('name')){
          $logsql->where('system_log.name','LIKE','%'.$request->input('name').'%');
        }


        if($request->input('type')){
          $logsql->where('system_log.type','LIKE','%'.$request->input('type').'%');
        }

        if($request->input('ip')){
          $logsql->where('system_log.ip_address','=',$request->input('ip'));
        }


        if($request->input('from_date')){
          $logsql->where('system_log.created_at','>=',$request->input('from_date'));
        }
         

        if($request->input('to_date')){
          $logsql->where('system_log.created_at','<=',$request->input('to_date'));
        }

        if($request->input('limit')){
            $this->limit=$request->input('limit');
        }

        $logs=$logsql->paginate($this->limit);

        $allrequest=array();
        foreach($request->all() as $key=>$value)
        {
          $allrequest[$key]=urldecode($value);
        }

        $logs->appends($allrequest)->links();

        return view('user.employment.loginhistory',['logs'=>$logs]);
    }



    public function atxclients(Request $request)
    {
        $sql=Client::where('client.atxclient','=',1);
                

        if($request->input('name')){
            $sql->where('client.name','LIKE','%'.$request->input('name').'%');
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
            
            $latlong=Client::where('city',$request->input('city'))->where('state',$request->input('state'))->first();
            $lat=$latlong->latitude;
            $lon=$latlong->longitude;

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
            $this->limit=$request->input('limit');
        }

        $clients=$sql->paginate($this->limit);

        return view('user.employment.atxclients',['clients'=>$clients]);
    }


    public function showclient($id,Request $request)
    {
        //
        DB::enableQueryLog();
        $sales=User::where('is_admin','=',3)->where('status','=',1)->get();
 
        $presql=Client::where('client.atxclient','=',1)->where('id', '<', $id);
        $previous = $presql->orderBy('client.created_at', 'desc')->max('id');

        $nextsql=Client::where('client.atxclient','=',1)->where('id', '>', $id);
        $next = $nextsql->orderBy('client.created_at', 'desc')->min('id');
         

        $user=Auth::user();
        $client=Client::find($id);
//dd(DB::getQueryLog()); exit;
        $clientcomments = DB::table('users')
            ->join('client_comment', 'client_comment.user_id', '=', 'users.id')
            ->select('users.id','users.name','client_comment.comment',DB::raw('DATE_FORMAT(client_comment.created_at, "%d %b %Y %r") as created_at'))->where('client_comment.client_id','=',$id)->get();

// echo '<pre>';print_r($empcomments);die();
        
        $data=['user_id'=>$user->id,'name'=>$user->name,'type'=>'view','comment'=>'sales viewed by '.$user->name,'ip_address'=>$request->ip()];

        Systemlog::create($data);


        //$templates=DB::table('template')->where('user_id','=',$user->id)->get();
        
        //$latestTemplate = Template::where('user_id','=',$user->id)->orderBy('id', 'desc')->first();
        //dd(DB::getQueryLog()); exit;
        return view('user.employment.showclient',['client'=>$client,'clientcomments'=>$clientcomments,'sales'=>$sales,'previous'=>$previous,'next'=>$next]);

    }


    public function saveClientComment(Request $request, $id){ 

        $user=Auth::user(); 

        //echo '<pre>';print_r($request->all()); die;
        $data=['user_id'=>$user->id,'client_id'=>$id,'comment'=>$request->input('comment'),'status'=>$request->input('status'),'type'=>$request->input('type')];

        clientComment::create($data);

        $client=Client::find($id);
        $client->followup_date=$request->input('followup_date');
        $client->followup_user=$user->id;
        $client->save();

        //$results=empComments::where('emp_id',$id)->get();

        $results = DB::table('users')->join('client_comment', 'users.id', '=', 'client_comment.user_id')->where('client_comment.client_id',$id)->select('users.name', 'client_comment.client_id', 'client_comment.comment', DB::raw('DATE_FORMAT(client_comment.created_at, "%d %b %Y %r") as created_at'))->where('client_comment.status','=','1')->get();

        return response()->json(['data' => $results,'status' => Response::HTTP_OK]); 
    }


}
