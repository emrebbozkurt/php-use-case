<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginRequest;
use App\Http\Requests\RegisterRequest;
use App\Repositories\UserRepository;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    protected UserRepository $repository;

    public function __construct(UserRepository $repository)
    {
        $this->repository = $repository;
    }

    public function loginIndex()
    {
        return view('auth.login');
    }

    public function login(LoginRequest $request)
    {
        $data = $request->validated();

        if (Auth::attempt($data)) {
            return redirect()->route('products');
        }

        return redirect()->back();
    }

    public function registerIndex()
    {
        return view('auth.register');
    }

    public function register(RegisterRequest $request)
    {
        $data = $request->validated();
        $data['password'] = Hash::make($data['password']);
        $user = $this->repository->create($data);

        if (isset($user) || $user !== null) {
            return redirect()->route('loginIndex');
        }

        return redirect()->back();
    }

    public function logout()
    {
        Auth::logout();

        return redirect()->route('loginIndex');
    }
}
