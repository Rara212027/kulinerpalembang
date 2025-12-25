<?php

namespace App\Http\Controllers;

use App\Models\Menu;
use Illuminate\Http\Request;

class HomeController extends Controller
{
     public function index()
    {
        $menus = Menu::take(3)->get();
        return view('pages.home', compact('menus'));
    }
}
