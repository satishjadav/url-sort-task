<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserAuth extends Controller
{
    public function UserLogin(Request $request)
    {
        $getUser = User::where('email', $request['email'])->first();
        $credentials = $request->only('email', 'password');
        if ($getUser && Hash::check($request['password'], $getUser['password']) && Auth::guard('admin')->attempt($credentials)) {
            Auth::guard('admin')->login($getUser);
            return response(['status' => 1, 'data' => []], 200);
        }
        return response(['status' => 0, 'data' => []], 200);
    }
}
