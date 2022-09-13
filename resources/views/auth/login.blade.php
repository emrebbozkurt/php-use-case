@extends('layouts.master')
@section('title', 'Login')
@section('css')
    <style>
        body {
            background: #007bff;
            background: linear-gradient(to right, #0062E6, #33AEFF);
        }

        .btn-login {
            font-size: 0.9rem;
            letter-spacing: 0.05rem;
            padding: 0.75rem 1rem;
        }
    </style>
@endsection
@section('body')
    <div class="container">
        <div class="row">
            <div class="col-sm-9 col-md-7 col-lg-5 mx-auto">
                <div class="card border-0 shadow rounded-3 my-5">
                    <div class="card-body p-4 p-sm-5">
                        <h5 class="card-title text-center mb-5 fw-light fs-5">Sign In</h5>
                        <form action="{{ route('login') }}" method="post">
                            <div class="form-floating mb-3">
                                <input type="email" name="email" class="form-control" id="floatingInput"
                                       placeholder="Email">
                                <label for="floatingInput">Email address</label>
                            </div>
                            <div class="form-floating mb-3">
                                <input type="password" name="password" class="form-control" id="floatingPassword"
                                       placeholder="Password" minlength="8">
                                <label for="floatingPassword">Password</label>
                            </div>

                            <div class="form-check mb-3">
                                <input class="form-check-input" type="checkbox" value="" id="rememberPasswordCheck">
                                <label class="form-check-label" for="rememberPasswordCheck">
                                    Remember password
                                </label>
                            </div>
                            <div class="d-grid mb-2">
                                @csrf
                                <button class="btn btn-primary btn-login text-uppercase fw-bold" type="submit">Sign
                                    in
                                </button>
                            </div>
                            <a class="d-block text-center mt-2 small" href="{{ route('registerIndex') }}">Don't have an
                                account? Register</a>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
