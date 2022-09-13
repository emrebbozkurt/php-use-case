@extends('layouts.master-nav')
@section('title', 'Cart')
@section('body')
    <!-- Header-->
    <header class="bg-dark py-5">
        <div class="container px-4 px-lg-5 my-5">
            <div class="text-center text-white">
                <h1 class="display-4 fw-bolder">Cart</h1>
            </div>
        </div>
    </header>
    <!-- Section-->
    <section class="pt-5 pb-5 py-5">
        <div class="container">
            <div class="row w-100">
                <div class="col-lg-12 col-md-12 col-12">
                    <table class="table table-responsive">
                        <thead>
                        <tr>
                            <th style="width:40%">Product</th>
                            <th style="width:10%">Price</th>
                            <th style="width:5%">Quantity</th>
                            <th style="width:16%"></th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($items['products'] as $item)
                            <tr>
                                <td>
                                    <div class="row">
                                        <div class="col-md-3 text-start">
                                            <img src="{{ asset($item->image) }}" alt="{{ $item->title }}"
                                                 class="card-img-top">
                                        </div>
                                        <div class="col-md-9 text-start mt-sm-2">
                                            <h4>{{ $item->title }}</h4>
                                        </div>
                                    </div>
                                </td>
                                <td><h5 class="mt-sm-2">${{ $item->price }}</h5></td>
                                <td>
                                    <label for="quantity">
                                        <input type="number" name="quantity" id="quantity"
                                               class="form-control form-control-lg text-center quantity"
                                               value="{{ $item->quantity }}" data-id="{{ $item->id }}" min="1">
                                    </label>
                                </td>
                                <td>
                                    <div class="text-end">
                                        <a class="btn btn-danger border-danger bg-danger btn-md mb-2 delete-prod-cart"
                                           data-id="{{ $item->id }}">
                                            <i class="bi bi-trash"></i>
                                        </a>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                    @if(Cart::getCount() !== 0)
                        <div class="float-end text-end">
                            <h4>Total: ${{ $items['total'] }}</h4>
                        </div>
                        <div class="row d-flex align-items-center">
                            <div class="col-sm-6 order-md-2 text-start">
                                <a class="btn btn-danger mb-4 btn-lg pl-5 pr-5 destroy-cart">
                                    <i class="bi bi-trash"></i>
                                    Empty
                                </a>
                            </div>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </section>
@endsection
@section('scripts')
    <script src="{{ asset('assets/js/cart.js') }}"></script>
@endsection
