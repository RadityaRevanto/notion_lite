<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\TutorialDetail;

class Tutorial extends Model
{
    protected $fillable = [
        'judul',
        'kdmk',
        'presentation_url',
        'finished_url',
        'creator_email'
    ];

    public function details()
    {
        return $this->hasMany(TutorialDetail::class)->orderBy('step_order');
    }
}