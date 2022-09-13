@extends('layouts.master')
@section('title', 'Register')
@section('css')
    <style>
        body {
            background: #007bff;
            background: linear-gradient(to right, #0062E6, #33AEFF);
        }

        .btn-register {
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
                        <h5 class="card-title text-center mb-5 fw-light fs-5">Register</h5>
                        <form action="{{ route('register') }}" method="post">
                            <div class="form-floating mb-3">
                                <input type="text" name="name" id="name" class="form-control"
                                       placeholder="Name">
                                <label for="name">Name</label>
                            </div>
                            <div class="form-floating mb-3">
                                <input type="email" name="email" id="email" class="form-control"
                                       placeholder="Email">
                                <label for="email">Email address</label>
                            </div>
                            <div class="form-floating mb-3">
                                <input type="password" name="password" id="password" class="form-control"
                                       placeholder="Password" minlength="8">
                                <label for="password">Password</label>
                            </div>
                            <div class="form-floating mb-3">
                                <input type="password" name="password_confirmation" id="password_confirmation"
                                       class="form-control" placeholder="Confirm Password" minlength="8">
                                <label for="password_confirmation">Confirm Password</label>
                            </div>

                            <div class="d-grid mb-2">
                                @csrf
                                <button class="btn btn-primary btn-register text-uppercase fw-bold" type="submit">
                                    Register
                                </button>
                            </div>
                            <a class="d-block text-center mt-2 small" href="{{ route('loginIndex') }}">Have an account?
                                Sign In</a>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

