<?php

namespace App\Http\Controllers\GetinfoAuth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Auth;
use Hesto\MultiAuth\Traits\LogsoutGuard;

class LoginController extends Controller
{


    use AuthenticatesUsers, LogsoutGuard {
        LogsoutGuard::logout insteadof AuthenticatesUsers;
    }

    public $redirectTo = '/getinfo/supervisor';

    public function __construct()
    {
      $this->middleware('getinfo.guest', ['except' => 'logout']);
    }


    public function showLoginForm()
    {
        return view('getinfo.auth.login');
    }

    protected function guard()
    {
        return Auth::guard('getinfo');
    }
}
