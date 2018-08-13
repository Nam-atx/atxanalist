<?php

namespace App\Http\Controllers\Sales;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Http\Response;
use App\clientComment;
use App\Systemlog;
use App\Client;
use App\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Mail\sendEmail;
use Illuminate\Support\Facades\Mail;
use App\Traits\latlon;

use Illuminate\Support\Facades\Validator;
use Exception;

class ClientController extends Controller
{


    use latlon;
     /**
     * Create a new controller instance.
     *
     * @return void
     */
     protected $address='';

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

        $sql=DB::table('client')->select('client.*');
        
        if($request->input('name')){
            $sql->where('name','LIKE','%'.$request->input('name').'%');
            $string.=',name='.$request->input('name');
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
        $clientsql=$sql->paginate(5);

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

        $data=['name'=>$request->input('name'),'contact'=>$request->input('contact'),'phone'=>$request->input('phone'),'email'=>$request->input('email'),'city'=>$request->input('city'),'state'=>$request->input('state'),'zipcode'=>$request->input('zipcode'),'requirement'=>$request->input('requirement'),'status'=>$request->input('status'),'opening_date'=>$request->input('opening_date'),'longitude'=>$response['longitude'],'latitude'=>$response['latitude']];

        $client = Client::create($data);

        return redirect()->route('sales.client.index')->with('message','Client has been created successfully');

    }


    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => 'required|string|max:255',
            'contact' => 'required|string|max:255',
            'phone' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:client',
            'city' => 'required|string',
            'state' => 'required|string',
            'zipcode' => 'required|string',
            'requirement' => 'required|string',
            'status' => 'required|string',
            'opening_date' => 'required|string',
        ]);
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
        $sales=User::where('is_admin','=',2)->where('status','=',1)->get();
        
        $user=Auth::user();
        $client=Client::find($id);

        $clientcomments = DB::table('users')
            ->join('client_comment', 'client_comment.user_id', '=', 'users.id')
            ->select('users.id','users.name','client_comment.comment',DB::raw('DATE_FORMAT(client_comment.created_at, "%d %b %Y %r") as created_at'))->where('client_comment.client_id','=',$id)->get();

// echo '<pre>';print_r($empcomments);die();
        
        $data=['user_id'=>$user->id,'name'=>$user->name,'type'=>'view','comment'=>'sales viewed by '.$user->name,'ip_address'=>$request->ip()];

        Systemlog::create($data);


        $templates=DB::table('template')->get();


        return view('sales.client.show',['client'=>$client,'clientcomments'=>$clientcomments,'sales'=>$sales,'templates'=>$templates]);

    }

    public function saveComment(Request $request, $id){
        $user=Auth::user();
        $data=['user_id'=>$user->id,'client_id'=>$id,'comment'=>$request->input('comment')];

        clientComment::create($data);

        //$results=empComments::where('emp_id',$id)->get();

        $results = DB::table('users')->join('client_comment', 'users.id', '=', 'client_comment.user_id')->where('client_comment.client_id',$id)->select('users.name', 'client_comment.client_id', 'client_comment.comment', DB::raw('DATE_FORMAT(client_comment.created_at, "%d %b %Y %r") as created_at'))->get();

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
}
