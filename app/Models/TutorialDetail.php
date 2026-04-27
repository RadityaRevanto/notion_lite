<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TutorialDetail extends Model
{
    protected $fillable = [
        'tutorial_id',
        'type',
        'step_order',
        'status',
        'content',
        'image_path',
        'caption',
        'language',
        'url'
    ];
}