<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use Illuminate\Http\Response;
use Input;
use App\Employment;
use App\empComments;
use DB;
use Session;
use Excel;
use Illuminate\Support\Facades\Validator;
use App\Mail\sendEmail;
use Illuminate\Support\Facades\Mail;

use Jcf\Geocode\Geocode;

use App\Traits\latlon;

class EmploymentController extends Controller
{
    //
    use latlon;

   
 public function sendmail(Request $request)
    {
        
        $title=$request->input('Title');
        $fname=$request->input('FirstName');
        $lname=$request->input('LastName');
        $email=$request->input('Email');
        $sendto=$request->input('SendTo');                  
        if(isset($sendto) && !empty($sendto)){
        
            $to       = $sendto;
            $subject  = 'Account Confirmation Link';      
            $message="Your Confirmation link \r\n";
            $message.="You have Successfully Registered And please pay Registration fees Before 17-Feb-2018. \r\n";
            $headers  = 'From: xyz@gmail.com' . "\r\n" .
                        'Reply-To: allthebest91@gmail.com' . "\r\n" .
                        'MIME-Version: 1.0' . "\r\n" .
                        'Content-type: text/html; charset=iso-8859-1' . "\r\n" .
                        'X-Mailer: PHP/' . phpversion();  
            ini_set("SMTP", "mx1.hostinger.in");
            ini_set("sendmail_from", "xyz@gmail.com");
            ini_set("smtp_port", "587");
            ini_set("smtp_username", "xyz@gmail.com");
            ini_set("smtp_password", "password123");
            ini_set("auth",true);
            if($sentmail=mail($to, $subject, $message, $headers) )
                {
           return true;
            } 
            else 
            {
            return false;  
            }
        }
    //  $check= Mail::to('junaid@atxlearning.com')->send(new sendEmail($request->input('Title'),$request->input('FirstName'),$request->input('LastName'),$request->input('Email'),$request->input('SendTo')));
    }


 public function mail(Request $request)
    {

        Mail::to('junaid@atxlearning.com')->send(new sendEmail($request->input('name'),$request->input('company'),$request->input('messagetemplates'),$request->input('message'),$request->input('titleofjob'),$request->input('email'),$request->input('jobdescription')));

    return "Your message has been delivered.";
        
    }



     public function geolocal()
     {
        $address='ALigarh,aligarh,Up,202002';
        $getinfo=$this->getlatlon($address);
        print_r($getinfo);
     }


    // show template
    public function importExport()
    {
        return view('admin.excel.importExport');
    }



    public function add()
    {
        return view('admin.emp.add');
    }


    public function save(Request $request){
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
            return redirect()->route('admin.emp.add')->withErrors($validator)->withInput();
        }

        $data=['title'=>$request->input('title'),'first_name'=>$request->input('first_name'),'last_name'=>$request->input('last_name'),'email'=>$request->input('email'),'phone'=>$request->input('phone'),'cell_number'=>$request->input('cell_number'),'best_time_to_call'=>$request->input('best_time_to_call'),'street1'=>$request->input('street1'),'street2'=>$request->input('street2'),'city'=>$request->input('city'),'state'=>$request->input('state'),'zipcode'=>$request->input('zipcode'),'country'=>$request->input('country'),'position'=>$request->input('position'),'days_available'=>implode(' ',$request->input('days_available')),'license'=>$request->input('license'),'need_call'=>$request->input('need_call'),'resume'=>$request->input('resume'), 'longitude'=>$response['longitude'],'latitude'=>$response['latitude']];

        $employment = Employment::create($data);

        return redirect()->route('admin.emp.list')->with('message','Client has been created successfully');
    }


    protected function validator(array $data)
    {
        return Validator::make($data, [
            'title' => 'required|string|max:255',
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:employment',
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


    // admin section employment listing

    public function list(Request $request)
    {
        $sql=DB::table('employment');
        if($request->input('position')){
            $sql->where('position','=',$request->input('position'));
           
        }
        if($request->input('city')){
            $sql->where('city','=',$request->input('city'));
            
        }
        if($request->input('state')){
            $sql->where('state','=',$request->input('state'));
          
        }

        $employments=$sql->paginate(10)->appends(request()->query());;

        //$employments = Employment::paginate(10);
        return view('admin.emp.list',['employments'=>$employments]);
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

        return redirect()->route('admin.emp.list')->with('message','Client has been updated successfully');
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


    // export data
    public function exportExcel($type)
    {
        $data = Employment::get()->toArray();
        return Excel::create('exportdata', function($excel) use ($data) {
            $excel->sheet('data', function($sheet) use ($data)
            {
                $sheet->fromArray($data);
            });
        })->download($type);
    }



    // import data
    public function importExcel(Request $request)
    {

        if($request->hasFile('import_file')){
            Excel::load($request->file('import_file')->getRealPath(), function ($reader) {
                    foreach ($reader->toArray() as $key => $row) {

                        $address='';
                        if($row['address_street_address']){
                            $address.=$row['address_street_address'].' ';
                        }
                        if($row['address_street_address_line_2']){
                            $address.=$row['address_street_address_line_2'].' ';
                        }

                        if($row['city']){
                            $address.=$row['city'].' ';
                        }
                        if($row['state']){
                            $address.=$row['state'].' ';
                        }

                        if($row['zip_code']){
                            $address.=$row['zip_code'].' ';
                        }
                        // echo $address; die;

                        $response=$this->getlatlon($address);


                        $data=['title'=>$row['title'], 'first_name'=>$row['first_name'], 'last_name'=>$row['last_name'],'email'=>$row['email_address'],'phone'=>$row['phone'],'cell_number'=>$row['cell_number'],'best_time_to_call'=>$row['best_time_to_call'],'street1'=>$row['address_street_address'],'street2'=>$row['address_street_address_line_2'],'city'=>$row['city'],'state'=>$row['state'],'zipcode'=>$row['zip_code'],'country'=>$row['address_country'],'position'=>$row['applying_for_position'],'days_available'=>$row['days_available'],'license'=>mb_convert_encoding($row['licenses_skills_training_awards'], 'UTF-8'),'need_call'=>$row['need_a_call_back'],'resume'=>'','longitude'=>$response['longitude'],'latitude'=>$response['latitude']];


                            Employment::create($data);
                    }

            });
        }
        flash('Your file successfully import in database!!!')->success();
        return back();
    }


    public function getList()
    {
        $employment = Employment::all();
        return response()->json(['data' => $employment,'status' => Response::HTTP_OK]);
    }



    public function getEmployeeDetail($id)
    {
        $employment = Employment::where('id',$id)->first();
        return response()->json(['data' => $employment,'status' => Response::HTTP_OK]);
    }



    public function postComment(Request $request,$id){
        $data=['user_id'=>$request->input('user_id'),'emp_id'=>$id,'comment'=>$request->input('comment')];

        empComments::create($data);

        //$results=empComments::where('emp_id',$id)->get();

        $results = DB::table('users')->join('emp_comments', 'users.id', '=', 'emp_comments.user_id')->where('emp_comments.emp_id',$id)->select('users.*', 'emp_comments.emp_id', 'emp_comments.comment', 'emp_comments.created_at')->get();

        return response()->json(['data' => $results,'status' => Response::HTTP_OK]);   
    }



    public function getComments($id){
        $results = DB::table('users')->join('emp_comments', 'users.id', '=', 'emp_comments.user_id')->where('emp_comments.emp_id',$id)->select('users.id','users.name', 'emp_comments.emp_id', 'emp_comments.comment', 'emp_comments.created_at')->get();

        return response()->json(['data' => $results,'status' => Response::HTTP_OK]); 
    }


    public function myform()
    {
        $templates = DB::table("template")->lists("template","id");
        return view('myform',compact('templates'));
    }

    /**
     * Get Ajax Request and restun Data
     *
     * @return \Illuminate\Http\Response
     */
    public function myformAjax($id)
    {
        $messages = DB::table("message")
                    ->where("template_id",$id)
                    ->lists("message","id");
        return json_encode($messages);
    }


}
