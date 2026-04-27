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

        $response = Http::withToken($token)->get(config('services.jwt_api.url') . '/getMakul'); 

        if ($response->successful()) {
            $data = $response->json();
            
            return view('pages.mata_kuliah', [
                'matkul' => $data['data']
            ]);
        }

        if ($response->status() === 401) {
            session()->forget('refresh_token');
            return redirect('/login')->with('error', 'Session habis, login ulang');
        }

        return back()->with('error', 'Gagal mengambil data mata kuliah');
    }
}