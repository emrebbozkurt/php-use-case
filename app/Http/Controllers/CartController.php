<?php

namespace App\Http\Controllers;

use App\Facades\Cart;
use App\Http\Requests\CartAddRequest;
use App\Http\Requests\CartDeleteRequest;
use App\Http\Requests\CartUpdateRequest;
use App\Models\Product;

class CartController extends Controller
{
    public function index()
    {
        $items = Cart::getItems();
        return view('cart.index', ['items' => $items]);
    }

    public function add(CartAddRequest $request)
    {
        $data = $request->validated();
        Cart::add(Product::find($data['id']));
        return response()->json(['status' => true]);
    }

    public function update(CartUpdateRequest $request)
    {
        $data = $request->validated();
        Cart::update(Product::find($data['id']), $data['qty']);
        return response()->json(['status' => true]);
    }

    public function delete(CartDeleteRequest $request)
    {
        $data = $request->validated();
        Cart::delete(Product::find($data['id']));
        return response()->json(['status' => true]);
    }

    public function destroy()
    {
        Cart::destroy();
        return response()->json(['status' => true]);
    }
}
