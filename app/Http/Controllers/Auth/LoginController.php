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


    public function showLoginForm()
    {
        if (Auth::check() && Auth::user()->is_admin==1) {
            return redirect('/admin/dashboard');
        } else if (Auth::check() && Auth::user()->is_admin==2) {
            return redirect('/sales/dashboard');
        } else if (Auth::check() && Auth::user()->is_admin==0) {
            return redirect('/user/dashboard');
        } 

        return view('auth.login');
    }


     public function login(Request $request)
    {


        $this->validateLogin($request);

        // If the class is using the ThrottlesLogins trait, we can automatically throttle
        // the login attempts for this application. We'll key this by the username and
        // the IP address of the client making these requests into this application.
        if ($this->hasTooManyLoginAttempts($request)) {

            $this->fireLockoutEvent($request);

            return $this->sendLockoutResponse($request);
        }

        if ($this->attemptLogin($request)) {
           
            return $this->sendLoginResponse($request);
        }

        // If the login attempt was unsuccessful we will increment the number of attempts
        // to login and redirect the user back to the login form. Of course, when this
        // user surpasses their maximum number of attempts they will get locked out.
        $this->incrementLoginAttempts($request);

        return $this->sendFailedLoginResponse($request);
    }


    /**
     * Send the response after the user was authenticated.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    protected function sendLoginResponse(Request $request)
    {
         
        $request->session()->regenerate();

        $this->clearLoginAttempts($request);
        
        return $this->authenticated($request, $this->guard()->user())
                ?: redirect()->intended($this->redirectPath());
    }


    protected function redirectPath()
    {

        $user=Auth::user();
        
        if (Auth::check() && $user->is_admin==1) {
            return '/admin/dashboard';
        } else if (Auth::check() && $user->is_admin==2) {
            return '/sales/dashboard';
        } else if (Auth::check() && $user->is_admin==0) {
            return '/user/dashboard';
        } 
    }


    protected function authenticated(Request $request, $user)
    {
        $data=['user_id'=>$user->id,'name'=>$user->name,'type'=>'login','comment'=>'Loggedin by '.$user->name,'ip_address'=>$request->ip()];

        Systemlog::create($data);
       
    }

}