<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;

class PublicNotice extends Model implements HasMedia
{
    use InteractsWithMedia;

    protected $fillable = [
        'label',
        'number',
        'year',
        'short_desc',
        'published_on',
        'status',
        'displayed',
        'file_path',
    ];

    protected $casts = [
        'published_on' => 'datetime',
        'displayed' => 'boolean',
    ];
}
