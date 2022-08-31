<?php

namespace App\Services\Api\V1\Auth;

use App\Models\User;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class Service
{
    public function login($data)
    {
        try
        {
            $userData = [
                'email' => $data['email'],
                'password' => $data['password']
            ];

            if (!Auth::attempt($userData))
            {
                return response()->json([
                    'message' => 'You cannot sign with those credentials.',
                    'error' => 'Unauthorised'
                ], 401);
            }

            $remember_me = isset($data['remember_me']) ? $data['remember_me'] : false;

            $token = Auth::user()->createToken(config('app.name'));
            $token->token->expires_at = $remember_me ?
                Carbon::now()->addMonth() :
                Carbon::now()->addDay();
            $token->token->save();

            return response()->json([
                'username' => Auth::user()->name,
                'token_type' => 'Bearer',
                'token' => $token->accessToken,
                'expires_at' => Carbon::parse($token->token->expires_at)->toDateString()
            ], 200);
        }
        catch (\Throwable $th)
        {
            return response()->json([
                'message' => 'Server Error',
                'error' => $th->getMessage()
            ], 500);
        }
    }

    public function register($data)
    {
        try
        {
            DB::beginTransaction();

            $user = User::create([
                'name' => $data['name'],
                'email' => $data['email'],
                'password' => Hash::make($data['password']),
            ]);

            Auth::login($user);
            $remember_me = isset($data['remember_me']) ? $data['remember_me'] : false;

            $token = $user->createToken(config('app.name'));
            $token->token->expires_at = $remember_me ?
                Carbon::now()->addMonth() :
                Carbon::now()->addDay();
            $token->token->save();

            DB::commit();

            return response()->json([
                'username' => $user->name,
                'token_type' => 'Bearer',
                'token' => $token->accessToken,
                'expires_at' => Carbon::parse($token->token->expires_at)->toDateString()
            ], 200);
        }
        catch (\Throwable $th)
        {
            DB::rollBack();

            return response()->json([
                'message' => 'Server Error',
                'error' => $th->getMessage()
            ], 500);
        }
    }
}

