<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Menu;
use Illuminate\Http\Request;

class CartController extends Controller
{
    public function index() {
        $carts = auth()->user()->carts->whereNull('order_id');
        $total_price_formatted = number_format($carts->sum('total_price'), 2, ',', '.');
        return view('client.cart', compact('carts', 'total_price_formatted'));
    }

    public function store(Request $request, $id) {
        if ($request->has('quantity')) {
            $menu = Menu::find($id);
            if ($menu) {
                $cart = auth()->user()->carts->whereNull('order_id')->where('menu_id', $id)->first();
                if ($cart) {
                    $cart->update([
                        'quantity' => $request->quantity + $cart->quantity,
                    ]);
                } else {
                    Cart::create([
                        'user_id' => auth()->user()->id,
                        'menu_id' => $id,
                        'quantity' => $request->quantity,
                    ]);
                }
                return redirect()->route('client.cart');
            } else {
                return redirect()->back()->with('error', 'Menu tidak ditemukan');
            }
        } else {
            return redirect()->back()->with('error', 'Please fill the quantity');
        }
    }

    public function destroy($id) {
        $cart = Cart::find($id);
        if ($cart) {
            $cart->delete();
            return redirect()->route('client.cart');
        } else {
            return redirect()->back()->with('error', 'Cart tidak ditemukan');
        }
    }
}
