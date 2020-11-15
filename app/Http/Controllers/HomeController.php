<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class HomeController extends Controller
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
     * @return \Illuminate\Contracts\Support\Renderable  insert_dailyattendence
     */
    public function index()
    {
        return view('home');
    }
    public function insert_dailyattendence(Request $request)
    {
        $data=array();
        $data['class']=$request->class;
        $data['total']=$request->total;
        $data['attend']=$request->attend;
        $data['absent']=$request->total-$request->attend;
        $insert=DB::table('attendence_info')->insert($data);
        if($insert){
            return redirect('/');
        }
        return view('home');
    }
}
