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
class ClientController extends Controller
{
    //
    use latlon;

    public function __construct()
    {
        $this->middleware(['auth','editor']);
    }
}
