<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LoginController extends Controller
{
    // menampilkan form login
    public function showLoginForm(){
        return view('login');
    }
}
