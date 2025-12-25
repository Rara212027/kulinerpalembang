<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Menu;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class MenuController extends Controller
{
    public function index(){
        $menus = Menu::all();
        return view('admin.menu.index', compact('menus'));
    }

    public function create(){
        return view('admin.menu.addMenu');
    }

    public function store(Request $request){
        $image = $request->file('image')->store('menus','public');

        Menu::create([
            'name' => $request->name,
            'description' => $request->description,
            'price' => $request->price,
            'image' => $image
        ]);

        return redirect()->route('admin.menu.index');
    }

    public function edit(Menu $menu){
        return view('admin.menu.editMenu', compact('menu'));
    }

    public function update(Request $request, Menu $menu){
        if ($request->hasFile('image')) {
            Storage::disk('public')->delete($menu->image);
            $menu->image = $request->file('image')->store('menus','public');
        }

        $menu->update($request->only('name','description','price'));

        return redirect()->route('admin.menu.index');
    }

    public function destroy(Menu $menu){
        Storage::disk('public')->delete($menu->image);
        $menu->delete();
        return back();
    }
}
