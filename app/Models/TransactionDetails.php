<?php

namespace App\Models;

use App\Providers\Model;

class TransactionDetail extends Model
{
    protected static $table = 'transaction_details';

    protected $fillable = [
        'tour_package_id',
        'transaction_id',
        'name',
        'price',
        'amount_of_people'
    ];

    public function transaction()
    {
        return $this->belongsTo(Transaction::class);
    }

    public function tourPackage()
    {
        return $this->belongsTo(TourPackage::class);
    }
}
