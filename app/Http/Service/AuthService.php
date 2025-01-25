<?php

namespace App\Http\Service;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthService {

    public function register_post($data) {

        $name = $data['name'];
        $email = $data['email'];
        $hashed_password = Hash::make($data['password']);

        try {

            $user = User::create([
                'name' => $name,
                'email' => $email,
                'password' => $hashed_password
            ]);

            Auth::login($user);

        } catch (\Exception $exception) {
            dd($exception);
        }

    }

    public function login_post($data) {

        $result = Auth::attempt($data);

    }

}
