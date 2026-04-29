<?php

namespace App\Http\Controllers;

use App\Models\Tutorial;

class PresentationController extends Controller
{
    public function presentation($token)
    {
        $tutorial = Tutorial::where('presentation_url', '/presentation/' . $token)->firstOrFail();
        $details  = $tutorial->details()
                        ->where('status', 'show')
                        ->orderBy('step_order')
                        ->get();
        return response()
            ->view('pages.presentation', compact('tutorial', 'details'))
            ->header('Refresh', '5');
    }

    public function finished($token)
    {
        $tutorial = Tutorial::where('finished_url', '/finished/' . $token)->firstOrFail();
        $details  = $tutorial->details()->orderBy('step_order')->get();

        return view('pages.finished', compact('tutorial', 'details'));
    }
}
