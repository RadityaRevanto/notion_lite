<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Str;
use App\Models\Tutorial;

class TutorialController extends Controller
{
    private $baseUrl;
    public function __construct()
    {
        $this->baseUrl = env('JWT_API_URL');
    }
    public function index()
    {
        $tutorials = Tutorial::latest()->get();
        $token = session('refresh_token');
        $matkuls = [];

        if ($token) {
            $response = Http::withToken($token)
                ->get($this->baseUrl . '/getMakul');

            if ($response->successful()) {
                $matkuls = $response->json('data');
            }
        }
        return view('pages.master.index', compact('tutorials', 'matkuls'));
    }

    public function store(Request $request)
    {
        do {
            $presentationUrl = "/presentation/" . Str::random(12);
        } while (Tutorial::where('presentation_url', $presentationUrl)->exists());

        do {
            $finishedUrl = "/finished/" . Str::random(12);
        } while (Tutorial::where('finished_url', $finishedUrl)->exists());

        Tutorial::create([
            'judul' => $request->judul,
            'kdmk' => $request->kdmk,
            'presentation_url' => $presentationUrl,
            'finished_url' => $finishedUrl,
            'creator_email' => session('user_email'),
        ]);

        return back()->with('success', 'Berhasil tambah tutorial');
    }

    public function destroy($id)
    {
        Tutorial::findOrFail($id)->delete();
        return back()->with('success', 'Tutorial berhasil dihapus');
    }
}
