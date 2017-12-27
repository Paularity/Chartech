<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Aircraft;

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
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
              // get all the nerds
        $aircraft = Aircraft::all();
        // load the view and pass the nerds
        return view('home')
          ->with('aircraft', $aircraft);
    }
}
