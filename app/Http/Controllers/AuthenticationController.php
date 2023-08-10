<?php

namespace App\Http\Controllers;

use App\Http\Resources\PostResource;
use App\Models\Post;
use App\Models\User;
use Illuminate\Validation\ValidationException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthenticationController extends Controller
{
    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        $user = User::where('email', $request->email)->first();

        if (!$user || !Hash::check($request->password, $user->password)) {
            throw ValidationException::withMessages([
                'email' => ['The provided credentials are incorrect.'],
            ]);
        }
        $token = $user->createToken($request->email)->plainTextToken; // 0kSi7XmjQW4OjMjIwWxQtADUdx8ZaF04Fg7QuPtP

        return $token;
    }



    public function logout(Request $request)
    {
        $request->user()->tokens()->delete();
    }



    public function me()
    {
        // Mendapatkan data user yang sedang login menggunakan token
        return response()->json(Auth::user());
    }
}
