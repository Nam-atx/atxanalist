<?php

namespace App\Http\Controllers;

use DB;
use App\Traits\latlon;
use App\Employment;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;
class HomeController extends Controller
{

    use latlon;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth',['except' => ['test']]);
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
        } else if (Auth::check() && Auth::user()->is_admin==3) {
            return redirect('/sales/dashboard');
        } else if (Auth::check() && Auth::user()->is_admin==2) {
            return redirect('/user/dashboard');
        } 
        return view('home');
    }


public function test1()
{
    $emps=Employment::all();
    foreach($emps as $emp){
        $e=Employment::find($emp->id);
        $temp=explode("-",$emp->application_date);
        $data_temp=$temp[2].'-'.$temp[1].'-'.$temp[0];
        //echo $emp->id.'=>'.Carbon::parse($emp->application_date)->format('Y-m-d') .'=>'. $data_temp.'<br>';
        $e->application_date=Carbon::parse($emp->application_date)->format('Y-m-d');
        $e->save();
    }
}

    public function test()
    { 
        $employees = DB::table('employment')->where('longitude','=','0')->where('latitude','=','0')->limit(100)->get();
        
        foreach($employees as $employee){

            $address='';
            // if($employee->street1){
            //     $address.=str_replace('#','',$employee->street1).' ';
            // }
            // if($employee->street2){
            //     $address.=str_replace('#','',$employee->street2).' ';
            // }

            if($employee->city){
                $address.=str_replace('#','',$employee->city).' ';
            }
            if($employee->state){
                $address.=str_replace('#','',$employee->state).' ';
            }

            if($employee->zipcode){
                $address.=str_replace('#','',$employee->zipcode).' ';
            }
            //echo $employee->id.'==>'.$address.'<br>';

            try {
            $address=rtrim($address);
            $response=$this->getlatlon($address);
            
               DB::table('employment')->where('id', $employee->id)->update(['longitude' =>$response['longitude'],'latitude'=> $response['latitude']]);

            } catch (\Exception $e) {
                echo $e->getMessage().'<br>';
            }
            
        }
    }
  
}
