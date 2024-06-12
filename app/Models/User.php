<?php

namespace App\Models;

use App\Providers\Model;

class User extends Model
{
    protected static $table = 'users';

    protected $fillable = [
        'username',
        'email',
        'role',
        'password'
    ];

    protected $hidden = [
        'password'
    ];

    public function transactions()
    {
        return $this->hasMany(Transaction::class);
    }
}
?>