<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (Auth::check() && Auth::user()->is_admin==1) {
            return redirect('/admin/dashboard');
        } else if (Auth::check() && Auth::user()->is_admin==2) {
            return redirect('/sales/dashboard');
        } else if (Auth::check() && Auth::user()->is_admin==0) {
            return redirect('/user/dashboard');
        } 
        return view('home');
    }

  
}
