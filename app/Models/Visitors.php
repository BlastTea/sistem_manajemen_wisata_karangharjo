<?php

namespace App\Models;

use App\Providers\Model;

class Visitors extends Model
{
    protected static $table = 'visitors';

    protected $fillable = [
        'visitor_name',
        'region',
        'email',
        'telp',
        'user_id'
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function transactions()
    {
        return $this->hasMany(Transaction::class);
    }
}
