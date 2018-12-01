<?php

namespace App\Http\Controllers;

use App\Models\Building;
use App\Models\Classes;
use App\Models\Enrollment;
use App\Models\Exam;
use App\Models\Notification;
use App\Models\User;
use Auth;
use Carbon\Carbon;
use Cornford\Googlmapper\Facades\MapperFacade as Mapper;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Validator;

class FrontendController extends Controller
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
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function dashboard()
    {
        return view('frontend.dashboard');
    }
}
