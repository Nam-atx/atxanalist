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


class AdminController extends Controller
{
    //
  use RegistersUsers;

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
    	return view('admin.dashboard');
    }


	// users list function

    public function users()
    {
    	$users=User::all();

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
        return User::create([
            'name'     => $data['name'],
            'email'    => $data['email'],
            'password' => bcrypt($data['password']),
            'is_admin' => $data['is_admin'],
            'status' => $data['status'],
            'phone' => $data['phone'],
        ]);
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
