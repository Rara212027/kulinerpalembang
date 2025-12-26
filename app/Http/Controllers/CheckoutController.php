<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CheckoutController extends Controller
{
    public function index()
    {
        $cart = session('cart', []);
        return view('pages.checkout', compact('cart'));
    }

    public function process(Request $request)
    {
        $cart = session('cart');

        if(!$cart){
            return redirect()->route('pages.cart');
        }

        $request->validate([
            'name' => 'required',
            'phone' => 'required',
            'address' => 'required'
        ]);

        $adminPhone = '6281312894129'; // GANTI nomor admin

        $message = "🛒 *Pesanan Kuliner Palembang*%0A%0A";
        $message .= "👤 Nama: {$request->name}%0A";
        $message .= "📞 No HP: {$request->phone}%0A";
        $message .= "📍 Alamat: {$request->address}%0A%0A";
        $message .= "*Detail Pesanan:*%0A";

        $total = 0;
        foreach($cart as $item){
            $subtotal = $item['price'] * $item['qty'];
            $total += $subtotal;

            $message .= "- {$item['name']} ({$item['qty']}x) = Rp "
                . number_format($subtotal,0,',','.') . "%0A";
        }

        $message .= "%0A*Total: Rp " . number_format($total,0,',','.') . "*";

        // kosongkan cart
        session()->forget('cart');

        return redirect("https://wa.me/$adminPhone?text=$message");
    }
}
