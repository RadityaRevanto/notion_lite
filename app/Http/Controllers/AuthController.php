<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Http;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    private $baseUrl;
    public function __construct()
    {
        $this->baseUrl = env('JWT_API_URL');
    }

    public function login(Request $request)
    {
        $response = Http::post($this->baseUrl . '/login', [
            'email' => $request->email,
            'password' => $request->password,
        ]);

        if ($response->successful()) {
            $data = $response->json();
            session([
                'refresh_token' => $data['refreshToken'],
                'user_email' => $request->email,
            ]);
            return redirect()->route('master-tutorial');
        } else {
            return back()->with('error', 'Email atau password salah');
        }
    }

    public function logout()
    {
        $token = session('refresh_token');

        if ($token) {
            Http::withToken($token)
                ->post($this->baseUrl . '/logout');
        }
        session()->forget('refresh_token');
        session()->invalidate();
        session()->regenerateToken();
        return redirect('/login')->with('success', 'Berhasil logout');
    }
}