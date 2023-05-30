<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class AuthController extends Controller
{
    public function login(Request $request)
    {
        $payload = $request->validate(
            [
                'email' => 'required|string',
                'password' => 'required',
            ]
        );

        $credential  = filter_var($payload['email'], FILTER_VALIDATE_EMAIL) ? 'email' : 'username';

        if (!Auth::attempt([
            $credential => $payload['email'],
            'password' => $payload['password']
        ])) {
            return response()
                ->json([
                    'status' => false,
                    'message' => 'These credentials do not match our records.',
                ], 400);
        }

        $user = User::query()->where($credential, $request->email)->first();

        return response()
            ->json([
                'status' => true,
                'message' => 'Login successfully',
                'token' => $user->createToken("API TOKEN")->plainTextToken,
                'data' => [
                    'user' => [
                        'username' => $user->username,
                        'email' => $user->email,
                        'level' => $user->level,
                        'email_verified_at' => $user->email_verified_at
                    ]
                ]
            ], 200);
    }

    public function logout()
    {
        $token = Auth::user()->tokens[0];
        dd($token);
    }
}
