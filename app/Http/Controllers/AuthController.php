<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginRequest;
use App\Http\Requests\RegisterRequest;
use Illuminate\Support\Facades\Auth;

class AuthController extends BaseController {

    public function register() {
        return view('auth.register');
    }

    public function login() {
        return view('auth.login');
    }

    public function register_post(RegisterRequest $request) {

        $data = $request->validated();

        $this->authService->register_post($data);

        return redirect()->route('index');
    }

    public function login_post(LoginRequest $request) {

        $data = $request->validated();

        $this->authService->login_post($data);

        return redirect()->route('index');
    }

    public function logout() {
        Auth::logout();

        return redirect()->route('login.get');
    }

}
