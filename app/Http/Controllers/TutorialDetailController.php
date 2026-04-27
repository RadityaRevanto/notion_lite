<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Tutorial;
use App\Models\TutorialDetail;
use Illuminate\Support\Facades\DB;

class TutorialDetailController extends Controller
{
    public function index($tutorialId)
    {
        return view('pages.detail_tutorial', [
            'tutorial' => Tutorial::findOrFail($tutorialId),
            'details'  => TutorialDetail::where('tutorial_id', $tutorialId)->orderBy('step_order')->get()
        ]);
    }

    public function store(Request $d, $tutorialId)
    {
        $d->validate([
            'type' => 'required|in:text,image,code,url',
            'status' => 'required|in:show,hide',
        ]);

        DB::transaction(function () use ($d, $tutorialId) {

            $order = TutorialDetail::where('tutorial_id', $tutorialId)
                        ->lockForUpdate()
                        ->max('step_order') + 1;

            $data = [
                'tutorial_id' => $tutorialId,
                'type'        => $d->type,
                'step_order'  => $order,
                'status'      => $d->status,
                'content'     => $d->content ?? $d->code,
                'language'    => $d->language,
                'url'         => $d->url,
            ];

            if ($d->type === 'image' && $d->hasFile('image')) {
                $data['image_path'] = $d->file('image')->store('tutorials','public');
                $data['caption']    = $d->caption;
            }

            TutorialDetail::create($data);
        });

        return back()->with('success','Step berhasil ditambahkan');
    }

    public function destroy($id)
    {
        TutorialDetail::findOrFail($id)->delete();
        return back();
    }

    public function update(Request $request, $id)
    {
        $detail = TutorialDetail::findOrFail($id);

        $detail->update([
            'status'     => $request->status,
            'content'    => $request->content ?? $request->code,
            'language'   => $request->language,
            'url'        => $request->url,
        ]);

        if ($detail->type === 'image') {
            if ($request->hasFile('image')) {
                $detail->update([
                    'image_path' => $request->file('image')->store('tutorials','public'),
                    'caption'    => $request->caption
                ]);
            } else {
                $detail->update([
                    'caption'    => $request->caption
                ]);
            }
        }

        return back()->with('success','Step berhasil diupdate');
    }
}