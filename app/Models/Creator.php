<?php

namespace App\Models;


use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class Creator extends Authenticatable
{
    use Notifiable;

    protected $fillable = [
        'name', 'password',
    ];

    protected $hidden = [
        'password', 'remember_token',
    ];

    public function Production()
    {
        return $this->hasMany('App\Models\Production');
    }
}
