<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    protected $fillable = [
        'name',
    ];
    public function users(){
        return $this->hasMany(Usersss::class);
    }

    public function permissions()
    {
        return $this->belongsToMany(Permission::class);
    }
}
