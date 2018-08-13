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
class ClientController extends Controller
{
    //
    use latlon;


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

                if($row['zipcode']){
                    $address.=$row['zipcode'].' ';
                }
                // echo $address; die;

                $response=$this->getlatlon($address);


                $data=['name'=>$row['name_of_client'], 'contact'=>$row['contact_person1'], 'phone'=>$row['phone_number'],'fax'=>$row['fax'],'email'=>$row['email'],'city'=>$row['city'],'state'=>$row['state'],'zipcode'=>$row['zipcode'],'requirement'=>$row['requirement'],'status'=>$row['status'],'opening_date'=>date('Y-m-d', strtotime($row['date'])),'longitude'=>$response['longitude'],'latitude'=>$response['latitude']];

                //echo '<pre>';print_r($data); echo '</pre>';die;
                Client::create($data);
            }

            });
        }
        flash('Your file successfully import in database!!!')->success();
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

        $data=['name'=>$request->input('name'),'contact'=>$request->input('contact'),'phone'=>$request->input('phone'),'fax'=>$request->input('fax'),'email'=>$request->input('email'),'city'=>$request->input('city'),'state'=>$request->input('state'),'zipcode'=>$request->input('zipcode'),'requirement'=>$request->input('requirement'),'status'=>$request->input('status'),'opening_date'=>$request->input('opening_date'),'longitude'=>$response['longitude'],'latitude'=>$response['latitude']];

        $client = Client::create($data);

        return redirect()->route('admin.client.list')->with('message','Client has been created successfully');
    }


    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => 'required|string|max:255',
            'contact' => 'required|string|max:255',
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
        $client->phone=$request->input('phone');
        $client->email=$request->input('email');
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
            'city' => 'required|string',
            'state' => 'required|string',
            'zipcode' => 'required|string',
            'requirement' => 'required|string',
        ]);
    }
}
