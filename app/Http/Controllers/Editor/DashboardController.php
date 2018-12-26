<?php

namespace App\Http\Controllers\Editor;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Client;
use App\clientComment;
use App\Systemlog;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use App\Traits\latlon;
class DashboardController extends Controller
{
    //

    public function index()
    {
    	   return view('editor.dashboard.index');	
    }

}
