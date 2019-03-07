<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Auth\Events\Registered;
use Illuminate\Foundation\Auth\RegistersUsers;
use auth;
use session;
use App\User;
use Illuminate\Contracts\Auth\Guard;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use App\Employment;
use App\Client;
use App\Role;
use App\Permission;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use App\Traits\latlon;

class AdminController extends Controller
{
    //
  use latlon;
  use RegistersUsers;
  protected $limit=50;

  protected $address='';

    public function __construct()
    {
        $this->middleware(['auth','admin']);
    }


    public function login(Request $request){

		if(Auth::user()){
			return redirect('/admin/dashboard');
		}

    	if($request->isMethod('post')){
    		$data=$request->input();
    		if(Auth::attempt(['email'=>$data['email'],'password'=>$data['password']])){
    			return redirect('/admin/dashboard');
    		} else {
    			
    			flash('Please login to access')->error();
    			return redirect()->action('AdminController@login');
    		}
    	}
    	return view('admin.login');
    }

    // dashboard function

    public function dashboard(){

        $total_dnd=Employment::where('dnd','=',1)->count();
        $total_recruiting_contacts=DB::table('employment')->join('emp_comments', 'emp_comments.emp_id', '=', 'employment.id')->select('employment.*')->count();
        $total_sales_contacts=DB::table('client')->join('client_comment', 'client_comment.client_id', '=', 'client.id')->select('client.*')->count();
        $total_emails=0;
        $current_employees=Employment::where('atxemployee','=',1)->count();

    	return view('admin.dashboard',['total_dnd'=>$total_dnd,'total_recruiting_contacts'=>$total_recruiting_contacts,'total_sales_contacts'=>$total_sales_contacts,'total_emails'=>$total_emails,'current_employees'=>$current_employees]);
    }

    public function totaldnd(Request $request)
    {
        $sql=Employment::where('dnd','=',1);
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

        //$empsql=$sql->orderBy('employment.application_date', 'desc')->paginate(20);
        $total_dnds=$sql->orderBy('employment.application_date', 'desc')->paginate($this->limit);

        return view('admin.dashboard.totaldnd',['employments'=>$total_dnds]);
    }


    public function totalemployees(Request $request)
    {

        $sql=Employment::where('atxemployee','=',1);

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
        $current_employees=$sql->orderBy('employment.application_date', 'desc')->paginate($this->limit);
        return view('admin.dashboard.totalemployees',['employments'=>$current_employees]);
        
    }

    public function totalsales(Request $request)
    {
        $sql=Client::select('client.*')->Join('client_comment','client_comment.client_id','=','client.id');

        if($request->input('email')){
            $sql->where('client.email','LIKE','%'.$request->input('email').'%');
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
        //   $sql->where('client.application_date','>=',$request->input('from_date'));
        // }
         

        // if($request->input('to_date')){
        //   $sql->where('client.application_date','<=',$request->input('to_date'));
        // }

         
        if($request->input('limit')){
            $this->limit=$request->input('limit');
        }

        //$empsql=$sql->orderBy('employment.application_date', 'desc')->paginate(20);
        $clients=$sql->orderBy('client.created_at', 'desc')->paginate($this->limit);

        return view('admin.dashboard.totalsales',['clients'=>$clients]);
    }

    public function totalrecruiter(Request $request)
    {
        $sql=Employment::select('employment.*')->Join('emp_comments','emp_comments.emp_id','=','employment.id');

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

        //$empsql=$sql->orderBy('employment.application_date', 'desc')->paginate(20);
        $employments=$sql->orderBy('employment.application_date', 'desc')->paginate($this->limit);

        return view('admin.dashboard.totalrecruiter',['employments'=>$employments]);
    }



	// users list function

    public function users()
    {
    	$users=User::all();
      //echo "<pre>"; var_dump(compact(['users'])); exit;      
    	return view('admin.users',compact(['users']));
    }

	// user create function

    public function userCreate()
    {
    	return view('admin.useradd');
    }

    // user edit function

    public function userEdit(Request $request,$id)
    {

    	$user=User::find($id);
    	//echo '<pre>';print_r($user); die;
    	return view('admin.useredit',compact(['user']));

    }


    // user update function

    public function userUpdate(Request $request,$id){

    	$user=User::find($id);

    	if(Validator::make($request->all(), ['name'=>'required|max:100','phone'=>'required|max:11'])->validate())
    	{
			$user->name=$request->input('name');    		
			$user->password=bcrypt($request->input('password'));
			$user->is_admin=$request->input('is_admin')	;
            $user->status=$request->input('status');
			$user->phone=$request->input('phone');
			$user->save();
			flash($user->name .' has been updated successfully.')->success();
			return redirect()->route('admin.users');
    	}

    }

    // user status enable

    public function userEnable($id)
    {
    	$user=User::find($id);
    	$user->status='1';
    	$user->save();

    	flash($user->name .' has been Enabled successfully.')->success();
		return redirect()->route('admin.users');
    }

     // user status enable

    public function userDisable($id)
    {
    	$user=User::find($id);
    	$user->status='0';
    	$user->save();

    	flash($user->name .' has been Disabled successfully.')->success();
		return redirect()->route('admin.users');
    }


     // user store function

    public function userStore(Request $request)
    {
    	
    	$this->uservalidator($request->all())->validate();

    	event(new Registered($user = $this->usersave($request->all())));
      

    	//Auth::login($user);
    	flash($user->name .' has been created successfully.')->success();
    	return $this->registered($request, $user)
                        ?: redirect($this->redirectPathUser($user));

    }



    protected function usersave(array $data)
    {
        $user=User::create([
            'name'     => $data['name'],
            'email'    => $data['email'],
            'password' => bcrypt($data['password']),
            'is_admin' => $data['is_admin'],
            'status' => $data['status'],
            'phone' => $data['phone'],
        ]);

        $role=Role::find($data['is_admin']);
        $user->attachRole($role);

        return $user;
    }


    protected function uservalidator(array $data)
    {
        return Validator::make($data, [
            'name'     => 'required|max:100',
            'email'    => 'required|email|max:100|unique:users',
            'password' => 'required|min:6|confirmed',
            'is_admin' => 'required',
        ]);
    }

    protected function redirectPathUser($user)
    {
    	return 'admin/users';
    }


}
