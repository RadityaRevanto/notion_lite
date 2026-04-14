<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AuthController extends Controller
{
    private const JWT_URL = 'https://jwt-auth-eight-neon.vercel.app';

    public function showLogin()
    {
        if (session('refresh_token')) {
            return redirect()->route('dashboard');
        }
        return view('auth.login');
    }

    public function login(Request $request)
    {
        $request->validate([
            'email'    => ['required', 'email'],
            'password' => ['required'],
        ]);

        // Panggil webservice
        $response = \Illuminate\Support\Facades\Http::post(self::JWT_URL . '/login', [
            'email'    => $request->email,
            'password' => $request->password,
        ]);

        if ($response->successful()) {
            $data = $response->json();
            session([
                'refresh_token' => $data['refreshToken'] ?? null,
                'user_email'    => $request->email,
                'user_name'     => $data['name'] ?? $request->email,
            ]);
            return redirect()->route('dashboard');
        }

        return back()
            ->with('error', 'Login gagal: ' . ($response->json()['message'] ?? 'Periksa email & password Anda.'))
            ->withInput($request->only('email'));
    }

    public function logout(Request $request)
    {
        // Panggil webservice logout
        \Illuminate\Support\Facades\Http::withToken(session('refresh_token'))
            ->post(self::JWT_URL . '/logout');

        session()->flush();
        return redirect()->route('login')->with('success', 'Berhasil keluar.');
    }
}
