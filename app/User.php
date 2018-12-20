<?php

namespace App;
use Laravel\Passport\HasApiTokens;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Zizaco\Entrust\Traits\EntrustUserTrait;
class User extends Authenticatable
{
    use HasApiTokens,Notifiable;
    use EntrustUserTrait;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password','is_admin','status','phone',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function noContacts(){
      $user=Auth::user();
       
      $count = DB::table('employment')->join('emp_comments', 'emp_comments.emp_id', '=', 'employment.id')->where('emp_comments.user_id','=',$user->id)->select('employment.*')->count();
      return $count;
    }

    public function count($days){
       $user=Auth::user();
       $now = Carbon::now();
       $nowdate=$now->toDateString();
       $back = Carbon::now()->subDays($days);
       $backdate=$back->toDateString();
      $count = DB::table('employment')->join('emp_comments', 'emp_comments.emp_id', '=', 'employment.id')->where('emp_comments.user_id','=',$user->id)->select('employment.*')->where(DB::raw("(DATE_FORMAT(emp_comments.created_at,'%Y-%m-%d'))"),'<=',$nowdate)->where(DB::raw("(DATE_FORMAT(emp_comments.created_at,'%Y-%m-%d'))"),'>=',$backdate)->count();
      return $count;
    }

    public function noClientContacts(){
      $user=Auth::user();
       
      $count = DB::table('client')->join('client_comment', 'client_comment.client_id', '=', 'client.id')->where('client_comment.user_id','=',$user->id)->select('client.*')->count();
      return $count;
    }



    public function clientcount($days){
       $user=Auth::user();
       $now = Carbon::now();
       $nowdate=$now->toDateString();
       $back = Carbon::now()->subDays($days);
       $backdate=$back->toDateString();
      $count = DB::table('client')->join('client_comment', 'client_comment.client_id', '=', 'client.id')->where('client_comment.user_id','=',$user->id)->select('client.*')->where(DB::raw("(DATE_FORMAT(client_comment.created_at,'%Y-%m-%d'))"),'<=',$nowdate)->where(DB::raw("(DATE_FORMAT(client_comment.created_at,'%Y-%m-%d'))"),'>=',$backdate)->count();
      return $count;
    }
}
