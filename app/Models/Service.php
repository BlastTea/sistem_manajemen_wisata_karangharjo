<?php

namespace App\Models;

use App\Providers\Model;

class Service extends Model
{
    protected static $table = 'services';

    protected $fillable = [
        'tour_package_id',
        'name',
    ];

    public function tourPackage()
    {
        return $this->belongsTo(TourPackage::class);
    }
}
