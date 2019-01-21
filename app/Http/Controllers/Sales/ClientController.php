<?php

namespace App\Http\Controllers\Sales;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Http\Response;
use App\clientComment;
use App\Systemlog;
use App\Client;
use App\User;
use App\Employment;
use App\empComments;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Mail\sendEmail;
use App\Mail\salestoclientEmail;
use Illuminate\Support\Facades\Mail;
use App\Traits\latlon;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Validator;
use Exception;
use App\Template;
use Carbon\Carbon;
class ClientController extends Controller
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


    public function todayfollowup(Request $request){
        $user=Auth::user();
        $now = Carbon::now();
        $comparedate=$now->toDateString();

        $sql=Client::where(DB::raw("(DATE_FORMAT(client.followup_date,'%Y-%m-%d'))"),'=',$comparedate)->where('followup_user',$user->id);

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

        // if($request->input('from_date')){
        //   $sql->where('client.created_at','>=',$request->input('from_date'));
        // }
         

        // if($request->input('to_date')){
        //   $sql->where('client.created_at','<=',$request->input('to_date'));
        // }

         
        if($request->input('limit')){
            $this->limit=$request->input('limit');
        }

        $clients=$sql->paginate($this->limit);
        return view('sales.dashboard.todayfollowup',['clients'=>$clients]);
    }


    public function futurefollowup(Request $request){
        $user=Auth::user();
        $now = Carbon::now();
        $comparedate=$now->toDateString();

        $sql=Client::where(DB::raw("(DATE_FORMAT(client.followup_date,'%Y-%m-%d'))"),'>',$comparedate)->where('client.followup_user',$user->id);

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

        // if($request->input('from_date')){
        //   $sql->where('client.created_at','>=',$request->input('from_date'));
        // }
         

        // if($request->input('to_date')){
        //   $sql->where('client.created_at','<=',$request->input('to_date'));
        // }

         
        if($request->input('limit')){
            $this->limit=$request->input('limit');
        }

        $clients=$sql->paginate($this->limit);
        return view('sales.dashboard.futurefollowup',['clients'=>$clients]);
    }


    public function atxclient(Request $request){
        $user=Auth::user();
        $mytime = \Carbon\Carbon::now();
        $client=Client::find($request->input('client_id'));
        $client->atxclient=1;
        $client->atxclient_date=$mytime->toDateTimeString();
        $client->atxclient_user=$user->id;
        $client->save();

        $data=['user_id'=>$user->id,'client_id'=>$client->id,'comment'=>'Mark as client','status'=>1,'type'=>''];

        clientComment::create($data);

        return redirect()->route('sales.client.show',$request->input('client_id'))->with('message','Client has been updated successfully');
    }

    public function nonatxclient(Request $request){

         $user=Auth::user();   
         $client=Client::find($request->input('client_id'));
         $client->atxclient=0;
         $client->atxclient_date=NULL;
         $client->atxclient_user=0;
         $client->save();

         $data=['user_id'=>$user->id,'client_id'=>$client->id,'comment'=>'Mark as Non client','status'=>1,'type'=>''];

         clientComment::create($data);


          return redirect()->route('sales.client.show',$request->input('client_id'))->with('message','Client has been updated successfully');
     }


    public function atxlead(Request $request){
        $user=Auth::user();
        $mytime = \Carbon\Carbon::now();
        $client=Client::find($request->input('client_id'));
        $client->atxlead=1;
        $client->atxlead_date=$mytime->toDateTimeString();
        $client->atxlead_user=$user->id;
        $client->save();

        $data=['user_id'=>$user->id,'client_id'=>$client->id,'comment'=>'Mark as lead','status'=>1,'type'=>''];

        clientComment::create($data);

        return redirect()->route('sales.client.show',$request->input('client_id'))->with('message','Lead has been updated successfully');
    }

    public function nonatxlead(Request $request){

         $user=Auth::user();   
         $client=Client::find($request->input('client_id'));
         $client->atxlead=0;
         $client->atxlead_date=NULL;
         $client->atxlead_user=0;
         $client->save();

         $data=['user_id'=>$user->id,'client_id'=>$client->id,'comment'=>'Mark as Non lead','status'=>1,'type'=>''];

         clientComment::create($data);


          return redirect()->route('sales.client.show',$request->input('client_id'))->with('message','Lead has been updated successfully');
     } 

    public function dnd(Request $request){
        $user=Auth::user();
        $mytime = \Carbon\Carbon::now();
        $client=Client::find($request->input('client_id'));
        $client->dnd=1;
        $client->dnd_date=$mytime->toDateTimeString();
        $client->dnd_user=$user->id;
        $client->save();

        $data=['user_id'=>$user->id,'client_id'=>$client->id,'comment'=>'Mark as DND','status'=>1,'type'=>''];

        clientComment::create($data);


        return redirect()->route('sales.client.show',$request->input('client_id'))->with('message','Client has been updated successfully');
    }

    public function nondnd(Request $request){
        $user=Auth::user();
         $client=Client::find($request->input('client_id'));
         $client->dnd=0;
         $client->dnd_date=NULL;
         $client->dnd_user=0;
         $client->save();

         $data=['user_id'=>$user->id,'client_id'=>$client->id,'comment'=>'Mark as Non client','status'=>1,'type'=>''];

        clientComment::create($data);

         return redirect()->route('sales.client.show',$request->input('client_id'))->with('message','Client has been updated successfully');
     }


    public function updaterequired($id, Request $request)
    {
        $user=Auth::user();
        $client=Client::find($id);
        $client->update_required=1;
        $client->updaterequired_user=$user->id;
        $client->save();

        $data=['user_id'=>$user->id,'client_id'=>$client->id,'comment'=>'Mark as update requred','status'=>1,'type'=>''];

        clientComment::create($data);
    }

    public function clientupdate(Request $request,$id){

        $client=Client::find($id);

        if(!empty($request->input('name'))){
            $client->name=$request->input('name');
        }

        if(!empty($request->input('contact'))){
            $client->contact=$request->input('contact');
        }
        
        if(!empty($request->input('designation'))){
            $client->designation=$request->input('designation');
        }

        if(!empty($request->input('phone'))){
            $client->phone=$request->input('phone');
        }
        if(!empty($request->input('email'))){
            $client->email=$request->input('email');
        }
        if(!empty($request->input('contact_1'))){
            $client->contact_1=$request->input('contact_1');
        }
        if(!empty($request->input('designation_1'))){
            $client->designation_1=$request->input('designation_1');
        }

        if(!empty($request->input('phone_1'))){
            $client->phone_1=$request->input('phone_1');
        }
        if(!empty($request->input('email_1'))){
            $client->email_1=$request->input('email_1');
        }
        if(!empty($request->input('contact_2'))){
            $client->contact_2=$request->input('contact_2');
        }
        if(!empty($request->input('designation_2'))){
            $client->designation_2=$request->input('designation_2');
        }
        if(!empty($request->input('phone_2'))){
            $client->phone_2=$request->input('phone_2');
        }
        if(!empty($request->input('email_2'))){
            $client->email_2=$request->input('email_2');
        }

        if(!empty($request->input('start_date'))){
            $client->start_date=$request->input('start_date');
        }

        if(!empty($request->input('portal'))){
            $client->portal=$request->input('portal');
        }


        if(!empty($request->input('profile'))){
            $client->profile=$request->input('profile');
        }
        
        if(!empty($request->input('subject'))){
            $client->subject=$request->input('subject');
        }
        if(!empty($request->input('weblink'))){
            $client->weblink=$request->input('weblink');
        }


        if(!empty($request->input('fax'))){
            $client->fax=$request->input('fax');
        }

        if(!empty($request->input('city'))){
            $client->city=$request->input('city');
        }
        if(!empty($request->input('state'))){
            $client->state=$request->input('state');
        }
        if(!empty($request->input('zipcode'))){
            $client->zipcode=$request->input('zipcode');
        }
        if(!empty($request->input('requirement'))){
            $client->requirement=$request->input('requirement');
        }

        $client->save();

        return redirect()->route('sales.client.show',$id)->with('message','Client has been updated successfully');
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

        $sql=DB::table('client')->select('client.*');
        
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
              $string.=',city='.$request->input('city');
           }

           if($request->input('state')){
              $this->address.=','.$request->input('state');
              $string.=',state='.$request->input('state');
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
              
               $string.=',city='.$request->input('city');
              
           }

           if($request->input('state')){
              $sql->where('client.state','LIKE','%'.$request->input('state').'%');
              $string.=',state='.$request->input('state');
           }

         }

        if($string){
            $data=['user_id'=>$user->id,'name'=>$user->name,'type'=>'search','comment'=>'client search by '.$user->name. '=>'.$string,'ip_address'=>$request->ip()];
            Systemlog::create($data);
        }

        if($request->input('limit')){
            $limit=$request->input('limit');
        } else{
          $limit=50;
        }


        $clientsql=$sql->paginate($limit);

        $clients=$clientsql->appends($request->query());

        return view('sales.client.index',['clients'=>$clients]);

    }

    

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('sales.client.add');
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

         $validator= $this->validator($request->all());

        if ($validator->fails()) {
            return redirect()->route('sales.client.create')->withErrors($validator)->withInput();
        }

        $address='';
        if($request->input('city')){
            $address.=$request->input('city').' ';
        }
        if($request->input('state')){
            $address.=$request->input('state').' ';
        }

        if($request->input('zipcode')){
            $address.=$request->input('zipcode').' ';
        }
        
        try {
           $response=$this->getlatlon($address);
           //print_r($response); die;
        } catch (\Exception $e) {
            echo $e->getMessage();
        }

        // $data=['name'=>$request->input('name'),'contact'=>$request->input('contact'),'phone'=>$request->input('phone'),'email'=>$request->input('email'),'city'=>$request->input('city'),'state'=>$request->input('state'),'zipcode'=>$request->input('zipcode'),'requirement'=>$request->input('requirement'),'status'=>$request->input('status'),'opening_date'=>$request->input('opening_date'),'longitude'=>$response['longitude'],'latitude'=>$response['latitude']];

        $data=['name'=>$request->input('name'), 'contact'=>$request->input('contact'),'designation'=>$request->input('designation'), 'phone'=>$request->input('phone'),'email'=>$request->input('email'),'contact_1'=>$request->input('contact_1'),'designation_1'=>$request->input('designation_1'), 'phone_1'=>$request->input('phone_1'),'email_1'=>$request->input('email_1'),'contact_2'=>$request->input('contact_2'),'designation_2'=>$request->input('designation_2'), 'phone_2'=>$request->input('phone_2'),'email_2'=>$request->input('email_2'),'fax'=>$request->input('fax'),'city'=>$request->input('city'),'state'=>$request->input('state'),'zipcode'=>$request->input('zipcode'),'requirement'=>$request->input('requirement'),'status'=>$request->input('status'),'longitude'=>0,'latitude'=>0];

        $client = Client::create($data);

        return redirect()->route('sales.client.index')->with('message','Client has been created successfully');

    }


    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => 'required|string|max:255',
            'contact' => 'required|string|max:255',
            'designation' => 'required|string|max:255',
            'phone' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:client',
            'city' => 'required|string',
            'state' => 'required|string',
            'zipcode' => 'required|string',
            // 'requirement' => 'required|string',
            // 'status' => 'required|string',
        ]);
    }


    public function myatxclients(Request $request)
    {
        $user=Auth::user();
        $sql=Client::where('client.atxclient','=',1)->where('client.atxclient_user','=',$user->id);
        
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
        return view('sales.client.myatxclients',['clients'=>$clients]);
    }


    public function atxclients(Request $request)
    {
        $sql=Client::where('client.atxclient','=',1);
        
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
        return view('sales.client.atxclients',['clients'=>$clients]);
    }



    public function atxleads(Request $request)
    {
        $sql=Client::where('client.atxlead','=',1);
        
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
        return view('sales.client.atxleads',['clients'=>$clients]);
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

        return view('sales.client.atxavailables',['employments'=>$employments]);

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
        DB::enableQueryLog();
        $sales=User::where('is_admin','=',3)->where('status','=',1)->get();
 
        if($request->input('schstatus')=='lead'){    
            $presql=Client::where('client.atxlead','=',1)->where('id', '<', $id);
        }
        else if($request->input('schstatus')=='client'){
            $presql=Client::where('client.atxclient','=',1)->where('id', '<', $id);
        }
        else{
            $presql=Client::where('id', '<', $id);
        }

        $previous = $presql->orderBy('client.created_at', 'desc')->max('id');

        if($request->input('schstatus')=='lead'){
            $nextsql=Client::where('client.atxlead','=',1)->where('id', '>', $id);
        }
        else if($request->input('schstatus')=='client'){
            $nextsql=Client::where('client.atxclient','=',1)->where('id', '>', $id);
        }
        else{
            $nextsql=Client::where('id', '>', $id);
        }


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


        $templates=DB::table('template')->where('user_id','=',$user->id)->get();
        
        $latestTemplate = Template::where('user_id','=',$user->id)->orderBy('id', 'desc')->first();
        //dd(DB::getQueryLog()); exit;
        return view('sales.client.show',['client'=>$client,'clientcomments'=>$clientcomments,'sales'=>$sales,'templates'=>$templates,'latestTemplate'=>$latestTemplate,'previous'=>$previous,'next'=>$next]);

    }



    public function showavailable($id,Request $request)
    {
        //
        $sales=User::where('is_admin','=',3)->where('status','=',1)->get();
        
        $user=Auth::user();
        $employment=Employment::find($id);

        $presql=Employment::where('employment.atxavailable','=',1)->where('id', '<', $id);
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


        $nextsql=Employment::where('employment.atxavailable','=',1)->where('id', '>', $id);
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


        //$templates=DB::table('template')->where('user_id','=',$user->id)->get();

        //$latestTemplate = Template::where('user_id','=',$user->id)->orderBy('id', 'desc')->first();


        return view('sales.client.showavailable',['previous'=>$previous,'next'=>$next,'employement'=>$employment,'empcomments'=>$empcomments,'sales'=>$sales]);

    }



    public function saveComment(Request $request, $id){ 
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


    public function sendEmailToSales(Request $request)
    {
        

        if($request->input('template_save')){

            $validator=$this->templatevalidator($request->all());

            if ($validator->fails()) {
                //return redirect()->route('sales.client.show',$request->input('client_id'))->withErrors($validator)->withInput();
                return redirect()->route('sales.client.show',$request->input('client_id'))->with('error', 'Template name already exists!');
             } else {
                $data=['user_id'=>$request->input('user_id'),'template_name'=>$request->input('template_name'),'message'=>$request->input('message')];
                Template::create($data);
             }
        }
        
        
        //$from[]=['name'=>'ATX Learning','address'=>'NoReply@atxlearning.com'];
        $replyTo[]=['address' => $request->input('reply_to'), 'name' => $request->input('name')];

        $user=Auth::user();
        //echo '<pre>';print_r($request->all());die('ttt');
        
        Mail::to($request->input('to'))->send(new salestoclientEmail($replyTo,$request->input('to'),$request->input('company'),$request->input('mail_subject'),htmlentities($request->input('message'), ENT_COMPAT),$user));


        return redirect()->route('sales.client.show',$request->input('client_id'))->with('message','Email has been send successfully');
                          
    }


    protected function templatevalidator(array $data)
    {  
        $user_id = $data['user_id'];

        return Validator::make($data, [
           'template_name' => Rule::unique('template')->where(function ($query) use ($user_id) {$query->where('user_id', $user_id);})
        ]);
    }

    public function getTemplate(Request $request){

        $json=array();

        $template=Template::where('user_id','=',$request->input('user_id'))->where('template_name','=',$request->input('template_name'))->first();

        if(!empty($template->message)){
            $json['message']=str_replace('</p>','',str_replace('<p>','',$template->message));
            $json['template_name']=$template->template_name;
        }
            
        return response()->json($json);
    }


    public function saveEmpComment(Request $request, $id){
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


}
