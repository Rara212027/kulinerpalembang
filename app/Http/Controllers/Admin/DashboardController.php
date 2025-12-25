<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Menu;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index() {
    $menus = Menu::all();
    return view('dashboard', compact('menus'));
}
}
