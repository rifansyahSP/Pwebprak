<?php

namespace App\Http\Controllers;

use App\Models\Menu;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\File;

class MenuController extends Controller
{
    public function index() {
        $menus = Menu::all();
        return view('admin.menu.index', compact('menus'));
    }

    public function create() {
        return view('admin.menu.create');
    }

    public function store(Request $request) {
        // Validate request
        $request->validate([
            'name' => 'required|string|max:255',
            'price' => 'required|numeric',
            'available_color' => 'required|string|max:255',
            'specification' => 'required|string|max:255',
            'description' => 'required|string|max:255',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        // Image upload
        $imageName = time() . '-' . $request->input('name') . '.' . $request->image->extension();
        $imageName = Str::of($imageName)->replace(' ', '');
        $request->image->move(public_path('img/menu'), $imageName);

        // Save to database
        Menu::create([
            'name' => $request->input('name'),
            'price' => $request->input('price'),
            'available_color' => $request->input('available_color'),
            'specification' => $request->input('specification'),
            'description' => $request->input('description'),
            'image' => '/img/menu/' . $imageName,
        ]);

        // Redirect
        return redirect()->route('menu')->with('success', 'Menu created successfully.');
    }

    public function edit($id) {
        $menu = Menu::find($id);
        return view('admin.menu.edit', compact('menu'));
    }

    public function update(Request $request, $id) {
        // Validate request
        $request->validate([
            'name' => 'required|string|max:255',
            'price' => 'required|numeric',
            'available_color' => 'required|string|max:255',
            'specification' => 'required|string|max:255',
            'description' => 'required|string|max:255',
            'image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        // Update database
        Menu::find($id)->update([
            'name' => $request->input('name'),
            'price' => $request->input('price'),
            'available_color' => $request->input('available_color'),
            'specification' => $request->input('specification'),
            'description' => $request->input('description'),
        ]);

        // Image upload
        if ($request->hasFile('image')) {
            if(Menu::find($id)->image != null) {
                File::delete(public_path(Menu::find($id)->image));
            }
            $imageName = time() . '-' . $request->input('name') . '.' . $request->image->extension();
            $imageName = Str::of($imageName)->replace(' ', '');
            $request->image->move(public_path('img/menu'), $imageName);
            Menu::find($id)->update([
                'image' => '/img/menu/' . $imageName,
            ]);
        }

        // Redirect
        return redirect()->route('menu')->with('success', 'Menu updated successfully.');
    }

    public function destroy($id) {
        if(Menu::find($id)->image != null) {
            File::delete(public_path(Menu::find($id)->image));
        }
        Menu::find($id)->delete();
        return redirect()->route('menu')->with('success', 'Menu deleted successfully.');
    }
}
