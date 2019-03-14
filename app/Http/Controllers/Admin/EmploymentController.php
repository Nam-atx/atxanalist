<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests;
use Illuminate\Http\Response;
use Input;
use App\Employment;
use App\Emphistory;
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
use Carbon\Carbon;

class EmploymentController extends Controller
{
    //
    use latlon;

    public function __construct()
    {
        $this->middleware(['auth','admin']);
    }


    public function list(Request $request)
    {
        
        $sql=DB::table('employment');

        if($request->input('name')){
            $sql->where('first_name','LIKE','%'.$request->input('name').'%')->orWhere('last_name','LIKE','%'.$request->input('name').'%')->orWhere(DB::raw('concat(first_name," ",last_name)'),'LIKE','%'.$request->input('name').'%');
        } 

        if($request->input('email')){
            $sql->where('email','LIKE','%'.$request->input('email').'%');
        }

        if($request->input('phone')){
            $sql->where('phone','LIKE','%'.$request->input('phone').'%');
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

        $employments=$sql->orderBy('application_date', 'desc')->paginate(10)->appends(request()->query());

        return view('admin.emp.list',['employments'=>$employments]);


    }
/************************START CODE***************************/
    public function updatelist(Request $request)
    {
         $sql=Employment::where('update_required','=',1);

         $employments=$sql->orderBy('application_date', 'desc')->paginate(10);

         return view('admin.emp.updatelist',['employments'=>$employments,]);
    }

    public function reqedit($id){
        $user=Auth::user();
        $employment = Employment::find($id);
        $empcomments = DB::table('users')
            ->join('emp_comments', 'emp_comments.user_id', '=', 'users.id')
            ->select('users.id','users.name','emp_comments.comment',DB::raw('DATE_FORMAT(emp_comments.created_at, "%d %b %Y %r") as created_at'))->where('emp_comments.emp_id','=',$id)->get();


        return view('admin.emp.reqedit',['employment'=>$employment,'empcomments'=>$empcomments]);
    }

    public function saveComment(Request $request, $id){ 
        $user=Auth::user();
        $data=['user_id'=>$user->id,'emp_id'=>$id,'comment'=>$request->input('comment')];

        empComments::create($data);

        $results=empComments::where('emp_id',$id)->get();

        $results = DB::table('users')->join('emp_comments', 'users.id', '=', 'emp_comments.user_id')->where('emp_comments.emp_id',$id)->select('users.name', 'emp_comments.emp_id', 'emp_comments.comment', DB::raw('DATE_FORMAT(emp_comments.created_at, "%d %b %Y %r") as created_at'))->get();


        return response()->json(['data' => $results,'status' => Response::HTTP_OK]); 
    }

/************************END CODE***************************/

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
       // $validator= $this->validatorUpdate($request->all());
       //   if ($validator->fails()) {
       //      return redirect()->route('admin.emp.edit',$id)->withErrors($validator)->withInput();
       //  }
        
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

           //$response=$this->getlatlon($address);
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
        $employment->application_date = Carbon::parse($request->input('application_date'))->format('Y-m-d'); 
        if(!empty($request->input('days_available'))){
            $employment->days_available=implode(' ',$request->input('days_available'));
        }
        $employment->license=$request->input('license');
        $employment->need_call=$request->input('need_call');
        $employment->resume=$request->input('resume');
        $employment->source=$request->input('source');
        //$employment->longitude=$response['longitude'];
        //$employment->latitude=$response['latitude'];
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
        ini_set('memory_limit', '-1');    
        
        $data = Employment::get()->toArray();
        //echo "<pre>"; var_dump($data); exit;
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
                
                $application_date = Carbon::parse($row['application_date'])->format('Y-m-d'); 
                
                $address='';
                /*if($row['address_street_address']){
                    $address.=$row['address_street_address'].' ';
                }
                if($row['address_street_address_line_2']){
                    $address.=$row['address_street_address_line_2'].' ';
                }*/

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

                //$response=$this->getlatlon($address);


                if(empty($row['first_name'])){
                    //echo '<pre>';print_r($row);echo '</pre>'; die('==>'.$key.'<==');
                   // echo '==>'.$key.'<==<br>';
                    continue;
                }
                
                //DB::enableQueryLog();    
                $emp=Employment::where('email','=',$row['email_address'])->first();
                //dd(DB::getQueryLog()); exit;
                

                if($emp){ 

                $data=['application_date'=>$emp->application_date,'title'=>$emp->title, 'first_name'=>$emp->first_name, 'last_name'=>$emp->last_name,'email'=>$emp->email,'phone'=>$emp->phone,'cell_number'=>$emp->cell_number,'best_time_to_call'=>$emp->best_time_to_call,'street1'=>$emp->street1,'street2'=>$emp->street2,'city'=>$emp->city,'state'=>$emp->state,'zipcode'=>$emp->zipcode,'country'=>$emp->country,'position'=>$emp->position,'days_available'=>$emp->days_available,'license'=>mb_convert_encoding($emp->license, 'UTF-8'),'need_call'=>$emp->need_call,'resume'=>$emp->resume,'source'=>$emp->source];                    
                Emphistory::create($data);

                $emp->application_date=$application_date;
                $emp->title=$row['title'];
                $emp->first_name=$row['first_name'];
                $emp->last_name=$row['last_name'];
                //$emp->email=$row['email_address'];
                $emp->phone=$row['phone'];
                $emp->cell_number=$row['cell_number'];
                $emp->best_time_to_call=$row['best_time_to_call'];
                $emp->street1=$row['address_street_address'];
                $emp->street2=$row['address_street_address_line_2'];
                $emp->city=$row['city'];
                $emp->state=$row['state'];
                $emp->zipcode=$row['zip_code'];
                $emp->country=$row['address_country'];
                $emp->position=$row['applying_for_position'];
                $emp->days_available=$row['days_available'];
                $emp->license=$row['licenses_skills_training_awards'];
                $emp->need_call=$row['need_a_call_back'];
                if(!empty($row['resume'])){
                    $emp->resume=$row['resume'];
                }
                if(!empty($row['source'])){
                    $emp->source=$row['source'];
                }    
                $emp->longitude='0';
                $emp->latitude='0';
                $emp->save();

                } else {

                if(empty($row['email_address']))
                {
                    $row['email_address']='atx_'.$key.'_'.time().'@atxlearning.com';
                    $email_status='1';
                } else{
                    $email_status='0';
                }

                if(!empty($row['source'])){
                    $source = $row['source'];
                }
                else{
                    $source = '';
                }    


                $data=['application_date'=>$application_date,'title'=>$row['title'], 'first_name'=>$row['first_name'], 'last_name'=>$row['last_name'],'email'=>$row['email_address'],'phone'=>$row['phone'],'cell_number'=>$row['cell_number'],'best_time_to_call'=>$row['best_time_to_call'],'street1'=>$row['address_street_address'],'street2'=>$row['address_street_address_line_2'],'city'=>$row['city'],'state'=>$row['state'],'zipcode'=>(strlen($row['zip_code'])==4)?'0'.$row['zip_code']:$row['zip_code'],'country'=>$row['address_country'],'position'=>$row['applying_for_position'],'days_available'=>$row['days_available'],'license'=>mb_convert_encoding($row['licenses_skills_training_awards'], 'UTF-8'),'need_call'=>$row['need_a_call_back'],'resume'=>$row['resume'],'source'=>$source,'longitude'=>'0','latitude'=>'0','email_status'=>$email_status];

                Employment::create($data);

                }
                //sleep(1);
            }

            });
        }
        
        flash('Your file successfully import in database!!!')->success();
        return back();
    }

}
