<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    public function __construct()
    {


        $this->middleware('guest')->except('logout');
    }

    //custom logout

    public function logout(){


        auth()->logout();
        $notification=['message' =>'You are Logout','alert-type'=>'success'];
        return redirect()->route('admin.login')->with($notification);
    }
}
