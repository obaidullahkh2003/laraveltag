<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Usersss extends Model
{
    protected $fillable=[
        'name',
        'email',
        'email_verified_at',
        'password',
        'address',
        'phone',
        'image',
        'role_id',
    ];

    public function articles()
    {
        return $this->hasMany(Articale::class);
    }
    public function role()
    {
        return $this->hasMany(Role::class);
    }
}
