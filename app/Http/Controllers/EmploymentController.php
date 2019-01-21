<?php

namespace App\Http\Controllers;

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
use Exception;

class EmploymentController extends Controller
{
    //
    use latlon;

    public function sendSalesEmail(Request $request){

        
        $employment=Employment::find($request->input('emp_id'))->first();
        $subject='Resume of '. $employment->first_name;
        $salesUser=User::where('email','=',$request->input('seles_email'))->first();
        $comment=empComments::where('emp_id','=',$request->input('emp_id'))->latest()->first();
        $user=Auth::user();
        $from[]=['name'=>$user->name,'address'=>$user->email];
        $emails = [$request->input('seles_email'), $user->email,'jitendra@atxlearning.com'];

        try {
            Mail::to($emails)->send(new salesEmail($from,$request->input('seles_email'),$employment,$subject,$comment,$user));
            $json['success']='Mail has been send successfully';
        } catch (\Exception $e) {
            $json['error']=$e->getMessage();;
        }
        
        return response()->json($json);

    }

    public function sendEmailToCandidate(Request $request)
    {
        if($request->input('template_save')){

            $validator=$this->templatevalidator($request->all());
            if ($validator->fails()) {
                //return redirect()->route('emp.show',$request->input('emp_id'))->withErrors($validator)->withInput();
                return redirect()->route('emp.show',$request->input('emp_id'))->with('error', 'Template name already exists!');
                
             } else {
                $data=['user_id'=>$request->input('user_id'),'template_name'=>$request->input('template_name'),'message'=>$request->input('message')];
                Template::create($data);
             }
        }
        
        //echo '<pre>';print_r($request->all());print_r($request->input('message'));die;
        //$from[]=['name'=>$request->input('name'),'address'=>$request->input('from')];
        $replyTo[]=['address' => $request->input('reply_to'), 'name' => $request->input('name')];

        $user=Auth::user();

        Mail::to($request->input('to'))->send(new candidateEmail($replyTo,$request->input('to'),$request->input('company'),$request->input('mail_subject'),htmlentities($request->input('message'), ENT_COMPAT),$user));


        return redirect()->route('emp.show',$request->input('emp_id'))->with('message','Email has been send successfully');
                          
    }

    protected function templatevalidator(array $data)
    {
        $user_id = $data['user_id'];

        return Validator::make($data, [
           'template_name' => Rule::unique('template')->where(function ($query) use ($user_id) {$query->where('user_id', $user_id);})
        ]);
    }

    // get the template based on request

    public function getTemplate(Request $request){

        $json=array();

        $template=Template::where('user_id','=',$request->input('user_id'))->where('template_name','=',$request->input('template_name'))->first();

        if(!empty($template->message)){
            $json['message']=str_replace('</p>','',str_replace('<p>','',str_replace('&nbsp;',' ',$template->message)));
            $json['template_name']=$template->template_name;
        }

        return response()->json($json);
    }

    // get the template based on request


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

        if($request->input('email')){
            $sql->where('email','LIKE','%'.$request->input('email').'%');
        }

        if($request->input('position')){
            $sql->where('position','like','%'.$request->input('position').'%');
           
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
        $days[]='';
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
