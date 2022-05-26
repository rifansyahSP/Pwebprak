<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function index() {
        $order = auth()->user()->orders->where('status', '=', 'pending')->first();
        return view('client.checkout', compact('order'));
    }

    public function checkout(Request $request) {
        $request->validate([
            'table_number' => 'required|numeric|min:1|max:12',
        ]);

        $cart = auth()->user()->carts->whereNull('order_id');
        if ($cart->count() > 0) {
            $order = Order::create([
                'user_id' => auth()->user()->id,
                'table_number' => $request->table_number,
                'status' => 'pending',
            ]);

            foreach ($cart as $item) {
                $item->update([
                    'order_id' => $order->id,
                ]);
            }

            return redirect()->route('client.order.checkout')->with('success', 'Order berhasil dibuat');
        } else {
            return redirect()->route('client.cart')->with('error', 'Cart kosong');
        }
    }

    public function adminIndex() {
        $orders = Order::all();
        return view('admin.pesanan.index', compact('orders'));
    }

    public function adminDetail($id) {
        $order = Order::findOrFail($id);
        return view('admin.pesanan.detail', compact('order'));
    }

    public function adminConfirm(Request $request, $id) {
        $order = Order::findOrFail($id);
        if ($request->has('status')) {
            $order->update([
                'status' => $request->status,
            ]);
            return redirect()->route('pesanan')->with('success', 'Order berhasil dikonfirmasi');
        } else {
            return redirect()->route('pesanan')->with('error', 'Status tidak valid');
        }
    }
}