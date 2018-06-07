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

class EmploymentController extends Controller
{
    //

	// show template
    public function importExport()
    {
        return view('admin.excel.importExport');
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
	                    $data=['title'=>$row['title'], 'first_name'=>$row['first_name'], 'last_name'=>$row['last_name'],'email'=>$row['email_address'],'phone'=>$row['phone'],'cell_number'=>$row['cell_number'],'best_time_to_call'=>$row['best_time_to_call'],'street1'=>$row['address_street_address'],'street2'=>$row['address_street_address_line_2'],'city'=>$row['city'],'state'=>$row['state'],'zipcode'=>$row['zip_code'],'country'=>$row['address_country'],'position'=>$row['applying_for_position'],'days_available'=>$row['days_available'],'license'=>mb_convert_encoding($row['licenses_skills_training_awards'], 'UTF-8'),'need_call'=>$row['need_a_call_back'],'resume'=>''];

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
}
