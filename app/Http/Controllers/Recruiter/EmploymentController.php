<?php

namespace App\Http\Controllers\Recruiter;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests;
use Illuminate\Http\Response;
use Input;
use App\Employment;
use App\empComments;
use App\Template;
use App\User;
use DB;
use Session;
use Excel;
use Illuminate\Support\Facades\Validator;
use App\Mail\sendEmail;
use App\Mail\candidateEmail;
use App\Mail\salesEmail;
use Illuminate\Support\Facades\Mail;
use Jcf\Geocode\Geocode;
use App\Traits\latlon;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;
use Exception;

class EmploymentController extends Controller
{
    //
    use latlon;

   
    public function create()
    {
        
        return view('recruiter.employment.add');
    }

    public function store(Request $request){
        $address='';
        if($request->input('street1')){
            $address.=$request->input('street1').' ';
        }
        if($request->input('street2')){
            $address.=$request->input('street2').' ';
        }

        if($request->input('city')){
            $address.=$request->input('city').' ';
        }
        if($request->input('state')){
            $address.=$request->input('state').' ';
        }

        if($request->input('zipcode')){
            $address.=$request->input('zipcode').' ';
        }
        // echo $address; die;

        try {
           $response=$this->getlatlon($address);
           //print_r($response); die;
        } catch (\Exception $e) {
            echo $e->getMessage();
        }

        $validator= $this->validator($request->all());
        
         if ($validator->fails()) {
            return redirect()->route('recruiter.employment.create')->withErrors($validator)->withInput();
         }

        $now = Carbon::now();
        $application_date=$now->toDateString();

        $data=['application_date'=>$application_date,'title'=>$request->input('title'),'first_name'=>$request->input('first_name'),'last_name'=>$request->input('last_name'),'email'=>$request->input('email'),'phone'=>$request->input('phone'),'cell_number'=>$request->input('cell_number'),'best_time_to_call'=>$request->input('best_time_to_call'),'street1'=>$request->input('street1'),'street2'=>$request->input('street2'),'city'=>$request->input('city'),'state'=>$request->input('state'),'zipcode'=>$request->input('zipcode'),'country'=>$request->input('country'),'position'=>$request->input('position'),'days_available'=>($request->input('days_available') ? implode(' ',$request->input('days_available')) : ''),'license'=>$request->input('license'),'need_call'=>$request->input('need_call'),'resume'=>$request->input('resume'),'source'=>$request->input('source'),'longitude'=>$response['longitude'],'latitude'=>$response['latitude']];

        $employment = Employment::create($data);

        return redirect()->route('user.employment.latestresume')->with('message','Resume has been created successfully');
    }


    protected function validator(array $data)
    {
        return Validator::make($data, [
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:employment',            
            'cell_number' => 'required|string',       
            'city' => 'required|string',
            'state' => 'required|string',
            'zipcode' => 'required|string',
            'country' => 'required|string',
            'position' => 'required|string',      
            'source' => 'required|string'
        ]);
    }

    public function edit($id){
        $employment = Employment::find($id);
        
        if($employment->days_available){
            if (preg_match("/Monday/", $employment->days_available))
            {
                $days[]='Monday';
            } 
            if(preg_match("/Tuesday/", $employment->days_available)){
                $days[]='Tuesday';
            } 
            if(preg_match("/Wednesday/", $employment->days_available)){
                $days[]='Wednesday';
            } 
            if(preg_match("/Thursday/", $employment->days_available)){
                $days[]='Thursday';
            } 
            if(preg_match("/Friday/", $employment->days_available)){
                $days[]='Friday';
            } 
            if(preg_match("/Any/", $employment->days_available)){
                $days[]='Any';
            }
        }
        
        return view('admin.emp.edit',['employment'=>$employment,'days'=>$days]);

    }



    public function update(Request $request, $id)
    {
       $validator= $this->validatorUpdate($request->all());
         if ($validator->fails()) {
            return redirect()->route('admin.emp.edit',$id)->withErrors($validator)->withInput();
        }
        
         $address='';
        if($request->input('street1')){
            $address.=$request->input('street1').' ';
        }
        if($request->input('street2')){
            $address.=$request->input('street2').' ';
        }

        if($request->input('city')){
            $address.=$request->input('city').' ';
        }
        if($request->input('state')){
            $address.=$request->input('state').' ';
        }

        if($request->input('zipcode')){
            $address.=$request->input('zipcode').' ';
        }
        // echo $address; die;

        try {
            $address=rtrim($address);

           $response=$this->getlatlon($address);
           //print_r($response); die;
        } catch (\Exception $e) {
            echo $e->getMessage();
        }

        $employment = Employment::find($id);

        $employment->title=$request->input('title');
        $employment->first_name=$request->input('first_name');
        $employment->last_name=$request->input('last_name');
        $employment->email=$request->input('email');
        $employment->phone=$request->input('phone');
        $employment->cell_number=$request->input('cell_number');
        $employment->best_time_to_call=$request->input('best_time_to_call');
        $employment->street1=$request->input('street1');
        $employment->street2=$request->input('street2');
        $employment->city=$request->input('city');
        $employment->state=$request->input('state');
        $employment->zipcode=$request->input('zipcode');
        $employment->country=$request->input('country');
        $employment->position=$request->input('position');
        $employment->days_available=implode(' ',$request->input('days_available'));
        $employment->license=$request->input('license');
        $employment->need_call=$request->input('need_call');
        $employment->resume=$request->input('resume');
        $employment->longitude=$response['longitude'];
        $employment->latitude=$response['latitude'];
        $employment->save();

        return redirect()->route('admin.emp.list')->with('message','Resume has been updated successfully');
    }


    protected function validatorUpdate(array $data)
    {
        return Validator::make($data, [
            'title' => 'required|string|max:255',
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255',
            'phone' => 'required|string',
            'cell_number' => 'required|string',
            'best_time_to_call' => 'required|string',
            'street1' => 'required|string',
            'city' => 'required|string',
            'state' => 'required|string',
            'zipcode' => 'required|string',
            'country' => 'required|string',
            'position' => 'required|string',
            'days_available' => 'required|array',
            'need_call' => 'required|string',
            'resume' => 'required|string',
        ]);
    }



}
