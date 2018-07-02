<?php

namespace App\Http\Controllers\User;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Http\Response;
use App\Employment;
use App\empComments;
use App\Systemlog;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class UserController extends Controller
{

     /**
     * Create a new controller instance.
     *
     * @return void
     */


    public function __construct()
    {
        $this->middleware('auth');
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        //
        $string='';

        $user=Auth::user();

        $sql=DB::table('employment');
        if($request->input('position')){
            $sql->where('position','=',$request->input('position'));
            $string.=',postion='.$request->input('position');
        }
        if($request->input('city')){
            $sql->where('city','=',$request->input('city'));
            $string.=',city='.$request->input('city');
        }
        if($request->input('state')){
            $sql->where('state','=',$request->input('state'));
            $string.=',state='.$request->input('state');
        }

        if($string){
            $data=['user_id'=>$user->id,'name'=>$user->name,'type'=>'search','comment'=>'search by '.$user->name. '=>'.$string,'ip_address'=>$request->ip()];
            Systemlog::create($data);
        }

        $employments=$sql->paginate(5)->appends(request()->query());
        //$employments=Employment::paginate(5);

        return view('user.employment.index',['employments'=>$employments]);

    }

    public function dnd(Request $request){

        $employment=Employment::find($request->input('emp_id'));

        $employment->dnd=1;

        $employment->save();

        return redirect()->route('emp.show',$request->input('emp_id'))->with('message','Employment has been updated successfully');
    }

  public function nondnd(Request $request){

         $employment=Employment::find($request->input('emp_id'));

         $employment->dnd=0;
         $employment->save();
        
          return redirect()->route('emp.show',$request->input('emp_id'))->with('message','Employment has been updated successfully');
     }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id,Request $request)
    {
        //

        $user=Auth::user();
        $employment=Employment::find($id);

        $empcomments = DB::table('users')
            ->join('emp_comments', 'emp_comments.user_id', '=', 'users.id')
            ->select('users.id','users.name','emp_comments.comment',DB::raw('DATE_FORMAT(emp_comments.created_at, "%d %b %Y %r") as created_at'))->where('emp_comments.emp_id','=',$id)->get();
        
        $data=['user_id'=>$user->id,'name'=>$user->name,'type'=>'view','comment'=>'viewed by '.$user->name,'ip_address'=>$request->ip()];

        Systemlog::create($data);

        return view('user.employment.show',['employement'=>$employment,'empcomments'=>$empcomments]);

    }


    public function saveComment(Request $request, $id){
        $user=Auth::user();
        $data=['user_id'=>$user->id,'emp_id'=>$id,'comment'=>$request->input('comment')];

        empComments::create($data);

        //$results=empComments::where('emp_id',$id)->get();

        $results = DB::table('users')->join('emp_comments', 'users.id', '=', 'emp_comments.user_id')->where('emp_comments.emp_id',$id)->select('users.name', 'emp_comments.emp_id', 'emp_comments.comment', DB::raw('DATE_FORMAT(emp_comments.created_at, "%d %b %Y %r") as created_at'))->get();

        return response()->json(['data' => $results,'status' => Response::HTTP_OK]); 
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
