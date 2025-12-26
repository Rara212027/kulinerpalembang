<?php

namespace App\Http\Controllers;

use App\Models\Menu;
use Illuminate\Http\Request;

class CartController extends Controller
{
    public function index()
    {
        $cart = session()->get('cart', []);
        // session()->forget('cart');
        return view('pages.cart', compact('cart'));
    }

    public function add($id)
{
    $menu = Menu::findOrFail($id);
    $cart = session()->get('cart', []);

    if(isset($cart[$id])){
        $cart[$id]['qty']++;
    } else {
        $cart[$id] = [
            'name'  => $menu->name,
            'price' => $menu->price,
            'image' => $menu->image,
            'qty'   => 1
        ];
    }

    session()->put('cart', $cart);

    // Mengembalikan jumlah total item unik di keranjang
    return response()->json([
        'status' => 'success',
        'message' => $menu->name . ' berhasil ditambah!',
        'cart_count' => count($cart) 
    ]);
}


    public function remove($id)
    {
        $cart = session()->get('cart', []);

        if (isset($cart[$id])) {
            unset($cart[$id]);
            session()->put('cart', $cart);
        }

        return redirect()->route('cart.index');
    }

    public function checkout()
    {
        $cart = session()->get('cart', []);
        return view('pages.checkout', compact('cart'));
    }

    public function processCheckout(Request $request)
    {
        $cart = session()->get('cart', []);

        $total = 0;
        $pesan = "🛒 *Pesanan Kuliner Palembang*\n\n";

        foreach ($cart as $item) {
            $subtotal = $item['price'] * $item['qty'];
            $total += $subtotal;

            $pesan .= "{$item['name']} ({$item['qty']}x)\n";
        }

        $pesan .= "\n👤 Nama: {$request->name}";
        $pesan .= "\n📞 HP: {$request->phone}";
        $pesan .= "\n📍 Alamat: {$request->address}";
        $pesan .= "\n\n💰 Total: Rp " . number_format($total,0,',','.');

        session()->forget('cart');

        return redirect()->away(
            "https://wa.me/6281312894129?text=" . urlencode($pesan)
        );
    }
}
