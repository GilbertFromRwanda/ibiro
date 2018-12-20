<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

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

    public function index()
    {
      $oname=app(\App\Http\Controllers\gahundaController::class)->getofficename();

     return view('office.home')->with('oname',$oname);
    }
}
