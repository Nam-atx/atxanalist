<?php

namespace App\Http\Controllers\Editor;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Excel;
use Illuminate\Support\Facades\Validator;
use Jcf\Geocode\Geocode;
use App\Traits\latlon;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Auth;
use Exception;
use App\Client;
use DB;
use App\clienthistory;
use Carbon\Carbon;
class ClientController extends Controller
{
    //
    use latlon;
    protected $limit=50;
    public function __construct()
    {
        $this->middleware(['auth','editor']);
    }

    public function list(Request $request){
        $user=Auth::user();
        $now = Carbon::now();
        $comparedate=$now->toDateString();

        $sql=Client::where('update_required','=',1);

        if($request->input('email')){
            $sql->where('client.email','LIKE','%'.$request->input('email').'%');
        }

        if($request->input('name')){
            $sql->where('client.name','LIKE','%'.$request->input('name').'%');
        }

        if($request->input('designation')){
            $sql->where('client.designation','LIKE','%'.$request->input('designation').'%');
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
            
            $latlong=Client::where('city',$request->input('city'))->where('state',$request->input('state'))->first();
            $lat=$latlong->latitude;
            $lon=$latlong->longitude;

            $sql->addselect(DB::raw("round((3959*acos(cos(radians($lat))*cos(radians(`client`.`latitude`))*cos(radians( `client`.`longitude`)-radians($lon))+sin(radians($lat))*sin(radians(`client`.`latitude`))))) AS `distance`"));
            $sql->where(DB::raw("round((3959*acos(cos(radians($lat))*cos(radians(`client`.`latitude`))*cos(radians( `client`.`longitude`)-radians($lon))+sin(radians($lat))*sin(radians(`client`.`latitude`)))))"),'<=',$request->input('radius'));

          }

         } else {

          if($request->input('city')){
              $sql->where('client.city','LIKE','%'.$request->input('city').'%');
           }

           if($request->input('state')){
              $sql->where('client.state','LIKE','%'.$request->input('state').'%');
           }

         }

        

         
        if($request->input('limit')){
            $this->limit=$request->input('limit');
        }

        $clients=$sql->paginate($this->limit);
        return view('editor.client.list',['clients'=>$clients]);
    }

    public function edit($id){

      $client=Client::where('update_required','=',1)->where('id','=',$id)->first();
        if(empty($client)){
            abort(404);
        }

      return view('editor.client.edit',['client'=>$client]);
    }

    public function update($id,Request $request){
        $client=Client::find($id);


        if($request->input('name')){
          $client->name=$request->input('name');
        }

        if($request->input('contact')){
          $client->contact=$request->input('contact');
        }


        if($request->input('designation')){
          $client->designation=$request->input('designation');
        }


        if($request->input('phone')){
          $client->phone=$request->input('phone');
        }


        if($request->input('email')){
          $client->email=$request->input('email');
        }

        if($request->input('contact_1')){
          $client->contact_1=$request->input('contact_1');
        }

        if($request->input('designation_1')){
          $client->designation_1=$request->input('designation_1');
        }

        if($request->input('phone_1')){
          $client->phone_1=$request->input('phone_1');
        }

        if($request->input('email_1')){
          $client->email_1=$request->input('email_1');
        }

        if($request->input('contact_2')){
          $client->contact_2=$request->input('contact_2');
        }

        if($request->input('designation_2')){
          $client->designation_2=$request->input('designation_2');
        }

        if($request->input('phone_2')){
          $client->phone_2=$request->input('phone_2');
        }


        if($request->input('email_2')){
          $client->email_2=$request->input('email_2');
        }


        if($request->input('fax')){
          $client->fax=$request->input('fax');
        }


        if($request->input('city')){
          $client->city=$request->input('city');
        }


        if($request->input('state')){
          $client->state=$request->input('state');
        }


        
        if($request->input('zipcode')){
          $client->zipcode=$request->input('zipcode');
        }

        
        if($request->input('requirement')){
          $client->requirement=$request->input('requirement');
        }

        if($request->input('opening_date')){
          $client->opening_date=$request->input('opening_date');
        }

        //if($request->input('dnd')){
          $client->dnd=$request->input('dnd');
        //}

        $client->update_required=$request->input('update_required');

        if($request->input('portal')){
          $client->portal=$request->input('portal');
        }


        if($request->input('profile')){
          $client->profile=$request->input('profile');
        }


        
        if($request->input('start_date')){
          $client->start_date=$request->input('start_date');
        }

        if($request->input('subject')){
          $client->subject=$request->input('subject');
        }


        if($request->input('weblink')){
          $client->weblink=$request->input('weblink');
        }

        $client->save();

        return redirect()->route('editor.client.list')->with('message','Client has been updated successfully');

    }
}
