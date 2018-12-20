<?php

namespace App\Http\Controllers\Admin;

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
class ClientController extends Controller
{
    //
    use latlon;


    public function __construct()
    {
        $this->middleware(['auth','admin']);
    }

    public function clientImportExport()
    {
        return view('admin.client.importExport');
    }

    // export data
    public function clientExportExcel($type)
    {
        $data = Client::get()->toArray();
        return Excel::create('exportdata', function($excel) use ($data) {
            $excel->sheet('data', function($sheet) use ($data)
            {
                $sheet->fromArray($data);
            });
        })->download($type);
    }

    // import data
    public function clientImportExcel(Request $request)
    {

        if($request->hasFile('import_file')){
            Excel::load($request->file('import_file')->getRealPath(), function ($reader) {
            foreach ($reader->toArray() as $key => $row) {//echo '<pre>';print_r($row); echo '</pre>';die;
                $address='';
               
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
                $client=Client::where('email','=',$row['email_1'])->first();
                if($client){
                    $data=['name'=>$client->name, 'contact'=>$client->contact,'designation'=>$client->designation, 'phone'=>$client->phone,'email'=>$client->email,'contact_1'=>$client->contact_1,'designation_1'=>$client->designation_1, 'phone_1'=>$client->phone_1,'email_1'=>$client->email_1,'contact_2'=>$client->contact_2,'designation_2'=>$client->designation_2, 'phone_2'=>$client->phone_2,'email_2'=>$client->email_2,'fax'=>$client->fax,'city'=>$client->city,'state'=>$client->state,'zipcode'=>$client->zipcode,'requirement'=>$client->requirement,'status'=>$client->status,'opening_date'=>$client->opening_date,'longitude'=>$client->longitude,'latitude'=>$client->latitude];

                    clienthistory::create($data);

                    $client->name=$row['name_of_client_school'];
                    $client->contact=$row['contact_person_1'];
                    $client->designation=$row['designation_1'];
                    $client->phone=$row['phone_number_1'];
                    $client->email=$row['email_1'];
                    $client->contact_1=$row['contact_person_2'];
                    $client->designation_1=$row['designation_2'];
                    $client->phone_1=$row['phone_number_2'];
                    $client->email_1=$row['email_2'];
                    if(!empty($row['contact_person_3'])){
                        $client->contact_2=$row['contact_person_3'];
                    }
                    if(!empty($row['designation_3'])){
                        $client->designation_2=$row['designation_3'];
                    }
                    if(!empty($row['phone_number_3'])){
                        $client->phone_2=$row['phone_number_3'];
                    }
                    if(!empty($row['email_3'])){
                        $client->email_2=$row['email_3'];
                    }
                    $client->fax=$row['fax'];
                    $client->city=$row['city'];
                    $client->state=$row['state'];
                    $client->zipcode=$row['zip_code'];
                    $client->requirement=$row['requirement'];
                    $client->status=$row['status'];
                    $client->opening_date=date('Y-m-d', strtotime($row['date']));
                    $client->longitude=0;
                    $client->latitude=0;
                    $client->save();


                } else {
                $data=['name'=>$row['name_of_client_school'], 'contact'=>$row['contact_person_1'],'designation'=>$row['designation_1'], 'phone'=>$row['phone_number_1'],'email'=>$row['email_1'],'contact_1'=>$row['contact_person_2'],'designation_1'=>$row['designation_2'], 'phone_1'=>$row['phone_number_2'],'email_1'=>$row['email_2'],'contact_2'=>$row['contact_person_3'],'designation_2'=>$row['designation_3'], 'phone_2'=>$row['phone_number_3'],'email_2'=>$row['email_3'],'fax'=>$row['fax'],'city'=>$row['city'],'state'=>$row['state'],'zipcode'=>$row['zip_code'],'requirement'=>$row['requirement'],'status'=>$row['status'],'opening_date'=>date('Y-m-d', strtotime($row['date'])),'longitude'=>0,'latitude'=>0];

                  //echo '<pre>';print_r($data); echo '</pre>';
                  Client::create($data);
                }
            }

            });
        }
        flash('Your file successfully import in database!!!')->success();
        //die;
        return back();
    }


    public function list(Request $request)
    {

        $sql=DB::table('client');
        if($request->input('name')){
            $sql->where('name','LIKE','%'.$request->input('name').'%');
           
        }
        if($request->input('city')){
            $sql->where('city','=',$request->input('city'));
            
        }
        if($request->input('state')){
            $sql->where('state','=',$request->input('state'));
          
        }

        $clients=$sql->paginate(10)->appends(request()->query());

        return view('admin.client.list',['clients'=>$clients]);

    }

    public function add()
    {
        return view('admin.client.add');
    }

    public function save(Request $request)
    {
        $address='';
        
        if($request->input('city')){
            $address.=$request->input('city').' ';
        }
        if($request->input('state')){
            $address.=$request->input('state').' ';
        }

        if($request->input('zipcode')){
            $address.=$request->input('zipcode').' ';
        }

        try {
           $response=$this->getlatlon($address);
           //print_r($response); die;
        } catch (\Exception $e) {
            echo $e->getMessage();
        }

        $validator= $this->validator($request->all());
        
         if ($validator->fails()) {
            return redirect()->route('admin.client.add')->withErrors($validator)->withInput();
         }

        $data=['name'=>$request->input('name'),'contact'=>$request->input('contact'),'designation'=>$request->input('designation'),'phone'=>$request->input('phone'),'fax'=>$request->input('fax'),'email'=>$request->input('email'),'contact_1'=>$request->input('contact_1'),'designation_1'=>$request->input('designation_1'),'phone_1'=>$request->input('phone_1'),'email_1'=>$request->input('email_1'),'contact_2'=>$request->input('contact_2'),'designation_2'=>$request->input('designation_2'),'phone_2'=>$request->input('phone_2'),'email_2'=>$request->input('email_2'),'city'=>$request->input('city'),'state'=>$request->input('state'),'zipcode'=>$request->input('zipcode'),'requirement'=>$request->input('requirement'),'status'=>$request->input('status'),'opening_date'=>$request->input('opening_date'),'longitude'=>$response['longitude'],'latitude'=>$response['latitude']];

        $client = Client::create($data);

        return redirect()->route('admin.client.list')->with('message','Client has been created successfully');
    }


    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => 'required|string|max:255',
            'contact' => 'required|string|max:255',
            'designation' => 'required|string|max:255',
            'phone' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:client',
            'city' => 'required|string',
            'state' => 'required|string',
            'zipcode' => 'required|string',
            'requirement' => 'required|string',
        ]);
    }

    public function edit($id){
        $client = Client::find($id);

        
        return view('admin.client.edit',['client'=>$client]);
    }

    public function update(Request $request, $id){
        //echo '<pre>';print_r($request->all());echo '</pre>';
        $validator= $this->validatorUpdate($request->all());
         if ($validator->fails()) {
            return redirect()->route('admin.client.edit',$id)->withErrors($validator)->withInput();
        }


        $address='';
               
        if($request->input('city')){
            $address.=$request->input('city').' ';
        }
        if($request->input('state')){
            $address.=$request->input('state').' ';
        }

        if($request->input('zipcode')){
            $address.=$request->input('zipcode').' ';
        }

        try {
          $address=rtrim($address);

          $response=$this->getlatlon($address);
           //print_r($response); die;
        } catch (\Exception $e) {
            echo $e->getMessage();
        }

        $client = Client::find($id);

        $client->name=$request->input('name');
        $client->contact=$request->input('contact');
        $client->designation=$request->input('designation');
        $client->phone=$request->input('phone');
        $client->email=$request->input('email');
        $client->contact_1=$request->input('contact_1');
        $client->designation_1=$request->input('designation_1');
        $client->phone_1=$request->input('phone_1');
        $client->email_1=$request->input('email_1');

        $client->contact_2=$request->input('contact_2');
        $client->designation_2=$request->input('designation_2');
        $client->phone_2=$request->input('phone_2');
        $client->email_2=$request->input('email_2');

        $client->city=$request->input('city');
        $client->state=$request->input('state');
        $client->zipcode=$request->input('zipcode');
        $client->longitude=$response['longitude'];
        $client->latitude=$response['latitude'];
        $client->requirement=$request->input('requirement');
        $client->status=$request->input('status');
        $client->opening_date=$request->input('opening_date');

        $client->save();
        return redirect()->route('admin.client.list')->with('message','Client has been updated successfully');
    }

   protected function validatorUpdate(array $data)
    {
        return Validator::make($data, [
            'name' => 'required|string|max:255',
            'contact' => 'required|string|max:255',
            'phone' => 'required|string|max:255',
            'email' => 'required|string|email|max:255',
            'contact_1' => 'required|string|max:255',
            'designation_1' => 'required|string|max:255',
            'phone_1' => 'required|string|max:255',
            'email_1' => 'required|string|email|max:255',
            'city' => 'required|string',
            'state' => 'required|string',
            'zipcode' => 'required|string',
            'requirement' => 'required|string',
        ]);
    }
}
