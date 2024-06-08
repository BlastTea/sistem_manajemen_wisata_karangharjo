<?php

namespace App\Models;

use App\Providers\Model;

class Image extends Model
{
    protected static $table = 'images';

    protected $fillable = [
        'tour_package_id',
        'image_url',
    ];

    public function tourPackage() {
        return $this->belongsTo(TourPackage::class);
    }
}
