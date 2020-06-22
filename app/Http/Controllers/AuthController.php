<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    
    public function __construct()
    {
        
    }

    public function login()
    {
        $this->validate(request(), [
            'username' => 'required',
            'password' => 'required',
        ]);

        $user = User::where('username', request()->username)
            ->first();
        if ($user) {
            if (Hash::check(request()->password, $user->password)) {
                $user->generateToken();
                $user->save();

                $success = [
                    "api_token" => $user->api_token,
                    "user" => $user,
                ];
                return $this->responseSuccess($success);
            }
        }

        return $this->responseFail("Invalid credentials", 401);
    }
}
