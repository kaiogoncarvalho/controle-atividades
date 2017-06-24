<?php

namespace App\Http\Controllers;

use App\Activity;
use App\Http\Requests\ActivityRequest;
use App\Status;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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

    public function edit($id)
    {

        return view('activity.new_edit', ['status' => Status::all(), 'activity' => Activity::find($id)]);
    }

    public function home()
    {

        return view('activity.home', ['status' => Status::all()]);
    }

    public function save($id = null, ActivityRequest $request)
    {
        $data = $request->all();
        $data['user_id'] = Auth::id();
        Activity::updateOrCreate(
            ['id' => $id],
            $data
        );

        return redirect('home');
    }
}
