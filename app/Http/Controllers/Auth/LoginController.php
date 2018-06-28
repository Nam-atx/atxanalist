<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use DB;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Carbon\Carbon;
use App\Systemlog;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = '/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }


 public function authenticated(Request $request)
    
    {

        $string='';

        $user=Auth::user();

        $sql=DB::table('system_log');
        if($request->input('name')){
            $sql->where('name','=',$request->input('name'));
            $string.=',name='.$request->input('name');
        }
        if($request->input('type')){
            $sql->where('type','=',$request->input('type'));
            $string.=',type='.$request->input('type');
        }
        if($request->input('comment')){
            $sql->where('comment','=',$request->input('comment'));
            $string.=',comment='.$request->input('comment');
        }


        if($request->input('last_login_at')){
            $sql->where('last_login_at','=',$request->input('last_login_at'));
            $string.=',last_login_at='.$request->input('last_login_at');
        }

        if($request->input('last_login_ip')){
            $sql->where('last_login_ip','=',$request->input('last_login_ip'));
            $string.=',last_login_ip='.$request->getClientIp();
        }
        
      $logs=$sql->paginate(5)->appends(request()->query());


        if($string){
            $data=['user_id'=>$user->id,'name'=>$user->name,'type'=>'search','comment'=>'search by '.$user->name. '=>'.$string];
            Systemlog::create($data);
        }

    }

}

