<?php

namespace App\Http\Controllers;

use App\Models\Menu;

class GuestController extends Controller
{
    public function index() {
        $menus = Menu::all();
        return view('client.index', compact('menus'));
    }

    public function about() {
        return view('about');
    }

    public function detail($id) {
        $menu = Menu::find($id);
        return view('client.detail', compact('menu'));
    }
}
