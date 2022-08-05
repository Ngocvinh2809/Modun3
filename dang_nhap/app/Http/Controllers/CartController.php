<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CartController extends Controller
{
    public function index()
    {

        $products = Product::all();
        // dd($products);   
        // session()->invalidate();
        return view('cart.index', compact('products'));
    }
    public function list()
    {
        return view('cart.list');
    }
    public function addToCart($id)
    {
        // dd(session('cart'));

        $products = Product::findOrFail($id);
        $cart = session()->get('cart', []);
        if (isset($cart[$id])) {
            $cart[$id]['quantity']++;
        } else {
            $cart[$id] = [
                "name" => $products->name,
                "quantity" => 1,
                "price" => $products->price,
                "img" => $products->image
            ];
        }
        session()->put('cart', $cart);
        
        return redirect()->back()->with('success', 'Product added to cart successfully!');
    }
    public function remove(Request $request ){
        if($request->id) {
            $cart = session()->get('cart');
            if(isset($cart[$request->id])) {
                unset($cart[$request->id]);
                session()->put('cart', $cart);
            }
            return redirect()->route('cart.list');
            session()->flash('success', 'Product removed successfully');
        }
    }
    public function update(Request $request)
    {

        if($request->id && $request->quantity){
            $cart = session()->get('cart');
            $cart[$request->id]["quantity"] = $request->quantity;
            session()->put('cart', $cart);
            session()->flash('success', 'Cart updated successfully');
        }
    }
}
