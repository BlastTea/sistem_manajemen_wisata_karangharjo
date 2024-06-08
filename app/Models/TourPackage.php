<?php

namespace App\Models;

use App\Providers\Model;

class TourPackage extends Model
{
    protected static $table = 'tour_packages';

    protected $fillable = [
        'name',
        'price',
        'description',
    ];

    public function transactionDetails()
    {
        return $this->hasMany(TransactionDetails::class);
    }

    public function videos()
    {
        return $this->hasMany(Video::class);
    }

    public function images()
    {
        return $this->hasMany(Image::class);
    }

    public function services()
    {
        return $this->hasMany(Service::class);
    }
}
