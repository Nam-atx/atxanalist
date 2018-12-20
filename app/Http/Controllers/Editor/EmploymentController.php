<?php

namespace App\Http\Controllers\Editor;

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

    protected $limit=50;
    protected $address='';

    public function __construct()
    {
        $this->middleware(['auth','editor']);
    }

    public function list(Request $request)
    {
        $sql=Employment::where('update_required','=',1);

        if($request->input('email')){
            $sql->where('email','LIKE','%'.$request->input('email').'%');
        }

        if($request->input('position')){
            $sql->where('position','LIKE','%'.$request->input('position').'%');
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

            $sql->addselect(DB::raw("round((3959*acos(cos(radians($lat))*cos(radians(`latitude`))*cos(radians( `longitude`)-radians($lon))+sin(radians($lat))*sin(radians(`latitude`))))) AS `distance`"));
            $sql->where(DB::raw("round((3959*acos(cos(radians($lat))*cos(radians(`latitude`))*cos(radians( `longitude`)-radians($lon))+sin(radians($lat))*sin(radians(`latitude`)))))"),'<=',$request->input('radius'));

          }

         } else {

          if($request->input('city')){
              $sql->where('city','LIKE','%'.$request->input('city').'%');
           }

           if($request->input('state')){
              $sql->where('state','LIKE','%'.$request->input('state').'%');
           }

         }

        if($request->input('from_date')){
          $sql->where('application_date','>=',$request->input('from_date'));
        }
         

        if($request->input('to_date')){
          $sql->where('application_date','<=',$request->input('to_date'));
        }

         
        if($request->input('limit')){
            $this->limit=$request->input('limit');
        }

        $empsql=$sql->orderBy('application_date', 'desc')->paginate($this->limit);
        
         $employments=$empsql->appends($request->query());


        $allrequest=array();
        foreach($request->all() as $key=>$value)
        {
          $allrequest[$key]=urldecode($value);
        }

        $employments->appends($allrequest)->links();
        
        return view('editor.employment.list',['employments'=>$employments]);
    }

    public function show(Request $request, $id){
        $employee=Employment::where('update_required','=',1)->where('id','=',$id)->first();
    }

    public function edit(Request $request, $id){
        $employment=Employment::where('update_required','=',1)->where('id','=',$id)->first();
        if(empty($employment)){
            abort(404);
        }
        
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

        return view('editor.employment.edit',['employment'=>$employment,'days'=>$days]);

    }


    public function update(Request $request,$id) {

        $validator= $this->validatorUpdate($request->all());

         if ($validator->fails()) {
            return redirect()->route('editor.emp.edit',$id)->withErrors($validator)->withInput();
        }

        $employment = Employment::find($id);

        if($request->input('title')){
            $employment->title=$request->input('title');
        }

        if($request->input('first_name')){
            $employment->first_name=$request->input('first_name');
        }

        if($request->input('last_name')){
            $employment->last_name=$request->input('last_name');
        }

        if($request->input('email')){
            $employment->email=$request->input('email');
        }

        if($request->input('phone')){
            $employment->phone=$request->input('phone');
        }

        if($request->input('cell_number')){
            $employment->cell_number=$request->input('cell_number');
        }

        if($request->input('best_time_to_call')){
            $employment->best_time_to_call=$request->input('best_time_to_call');
        }

        if($request->input('street1')){
            $employment->street1=$request->input('street1');
        }

        if($request->input('street2')){
            $employment->street2=$request->input('street2');
        }

        if($request->input('city')){
            $employment->city=$request->input('city');
        }

        if($request->input('state')){
            $employment->state=$request->input('state');
        }

        if($request->input('zipcode')){
            $employment->zipcode=$request->input('zipcode');
        }

        if($request->input('country')){
            $employment->country=$request->input('country');
        }

        if($request->input('position')){
            $employment->position=$request->input('position');
        }
        
        if($request->input('days_available')){
            $employment->days_available=implode(' ',$request->input('days_available'));
        }

        if($request->input('license')){
            $employment->license=$request->input('license');
        }

        if($request->input('need_call')){
            $employment->need_call=$request->input('need_call');
        }

        if($request->input('resume')){
            $employment->resume=$request->input('resume');
        }

        $employment->save();

        return redirect()->route('editor.emp.list')->with('message','Resume has been updated successfully');

    }

    protected function validatorUpdate(array $data)
    {
        return Validator::make($data, [
            'email' => 'required|string|email|max:255',
        ]);
    }

}
