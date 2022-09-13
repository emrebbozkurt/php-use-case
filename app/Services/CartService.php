<?php

namespace App\Services;

use App\Models\Product;
use Carbon\Carbon;
use Illuminate\Support\Facades\Redis;

class CartService
{
    protected string $instance;

    public function __construct()
    {
        $this->instance = 'user:cart:' . auth()->id();
    }

    public function cartId()
    {
        return Redis::get($this->instance);
    }

    public function getItems()
    {
        $cart = $this->check();

        $items = Redis::hgetall($this->instance . ':' . $cart);

        $total = 0;
        foreach ($items as $key => $item) {
            $item = json_decode($item);
            $items[$key] = $item;
            $total += $item->price * $item->quantity;
        }

        return array('products' => $items, 'total' => $total);
    }

    public function getCount()
    {
        $cart = $this->check();

        $items = Redis::hgetall($this->instance . ':' . $cart);

        return count($items);
    }

    public function add(Product $product)
    {
        $cart = $this->check();

        $items = Redis::hgetall($this->instance . ':' . $cart);

        if (array_key_exists($product->id, $items)) {
            $item = json_decode($items[$product->id]);
            $item->quantity += 1;
            $items[$product->id] = $item;
        } else {
            $items = array($product->id => [
                'id' => $product->id,
                'title' => $product->title,
                'image' => $product->image,
                'price' => $product->price,
                'quantity' => 1
            ]);
        }

        return Redis::hmset($this->instance . ':' . $cart, array($product->id => json_encode($items[$product->id])));
    }

    public function update(Product $product, $quantity)
    {
        $cart = $this->check();

        $items = Redis::hgetall($this->instance . ':' . $cart);

        if (array_key_exists($product->id, $items)) {
            $item = json_decode($items[$product->id]);
            $item->quantity = $quantity;
            $items[$product->id] = $item;
        }

        return Redis::hmset($this->instance . ':' . $cart, array($product->id => json_encode($items[$product->id])));
    }

    public function delete(Product $product)
    {
        $cart = $this->check();

        return Redis::hdel($this->instance . ':' . $cart, $product->id);
    }

    public function destroy()
    {
        $cart = $this->check();

        return Redis::del($this->instance . ':' . $cart);
    }

    public function check()
    {
        $cart = Redis::get($this->instance);
        if ($cart == null) {
            Redis::set($this->instance, md5(auth()->id() . Carbon::now()));
            $cart = Redis::get($this->instance);
        }
        return $cart;
    }
}
