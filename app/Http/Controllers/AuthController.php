<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Http;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function login(Request $request)
    {
        $response = Http::post('https://jwt-auth-eight-neon.vercel.app/login',[
            'email' => $request->email,
            'password' => $request->password,
        ]);

        if($response->successful()){
            $data = $response->json();
            session([
                'refresh_token' => $data['refreshToken'],
            ]);
            return redirect()->route('master-tutorial');
        }else{
            return redirect()->back()->with('error', 'Email atau password salah');
        }
    }

    public function logout()
    {
        $token = session('refresh_token');

        if ($token) {
            Http::withToken($token)
                ->post('https://jwt-auth-eight-neon.vercel.app/logout');
        }
        session()->forget('refresh_token');
        session()->invalidate();
        session()->regenerateToken();
        return redirect('/login')->with('success', 'Berhasil logout');
    }
}
