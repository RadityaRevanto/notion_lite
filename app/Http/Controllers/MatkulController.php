<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Http;
use Illuminate\Http\Request;

class MatkulController extends Controller
{
public function getMatkul()
{
    $token = session('refresh_token');

    if (!$token) {
        return redirect('/login')->with('error', 'Silakan login dulu');
    }

    $response = Http::withToken($token)
        ->get('https://jwt-auth-eight-neon.vercel.app/getMakul');

    if ($response->successful()) {
        $data = $response->json();

        return view('pages.mata_kuliah', [
            'matkul' => $data['data']
        ]);
    }

    return back()->with('error', 'Gagal mengambil data mata kuliah');
}
}