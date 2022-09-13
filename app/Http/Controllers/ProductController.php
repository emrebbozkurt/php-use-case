<?php

namespace App\Http\Controllers;

use App\Repositories\ProductRepository;

class ProductController extends Controller
{
    protected ProductRepository $repository;

    public function __construct(ProductRepository $repository)
    {
        $this->repository = $repository;
    }

    public function index()
    {
        $products = $this->repository->all();

        return view('products.index', ['products' => $products]);
    }
}
