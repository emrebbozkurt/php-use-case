<?php

namespace App\Facades;

use App\Models\Product;
use App\Services\CartService;
use Illuminate\Support\Facades\Facade;

/**
 * @method static mixed cartId()
 * @method static mixed add(Product $product)
 * @method static mixed update(Product $product, $quantity)
 * @method static mixed delete(Product $product)
 * @method static mixed destroy()
 * @method static mixed getItems()
 * @method static mixed getCount()
 */
class Cart extends Facade
{
    /**
     * Get the registered name of the component.
     *
     * @return string
     */
    protected static function getFacadeAccessor()
    {
        return CartService::class;
    }
}
