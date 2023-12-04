<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    public function redirect(){
        $usertyp=Auth::user()->usertype;
        if ($usertyp=='1') {
            return view('admin.adminhome');
        }
        if ($usertyp=='0') {
            return view('user.dashboard');
        }
    }
}
