<?php

namespace App\Models;

use App\Providers\Model;

class Transaction extends Model
{
    protected static $table = 'transactions';

    protected $fillable = [
        'visitor_id',
        'discount',
        'status'
    ];

    public function visitor()
    {
        return $this->belongsTo(Visitors::class);
    }

    public function transactionDetails()
    {
        return $this->hasMany(TransactionDetail::class);
    }
}
