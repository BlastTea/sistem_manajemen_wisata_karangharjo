<?php

namespace App\Models;

use App\Providers\Model;

class Video extends Model
{
    protected static $table = 'videos';

    protected $fillable = [
        'tour_package_id',
        'video_url'
    ];

    public function tourPackage()
    {
        return $this->belongsTo(TourPackage::class);
    }
}
