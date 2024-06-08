<?php

namespace App\Models;

use App\Providers\Model;

class Transaction extends Model
{
    protected static $table = 'transactions';

    protected $fillable = [
        'user_id',
        'discount',
        'status',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
