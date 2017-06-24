<?php

namespace App\Http\Controllers;

use App\Activity;
use App\Status;
use Illuminate\Http\Request;

class ActivityController extends Controller
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
    public function index()
    {
        return [
            "draw" =>  1,
            "recordsTotal" =>  1,
            "recordsFiltered" =>  1,
            'data' => Activity::all(),
        ];

    }

    public function create()
    {
        return view('activity.new_edit', ['status' => Status::all()]);
    }

    public function home()
    {

        return view('activity.home', ['status' => Status::all()]);
    }
}
