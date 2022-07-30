<?php

namespace App\Models;


use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
//監視インターフェイス
use OwenIt\Auditing\Contracts\Auditable;

// class Creator extends Authenticatable
class Creator extends Authenticatable implements Auditable
{
    use Notifiable;
    use \OwenIt\Auditing\Auditable;

    protected $fillable = [
        'admin_id',
        'name',
        'user_id',
        'email',
        'password'
    ];

    protected $hidden = [
        'password', 'remember_token',
    ];

    public function Production()
    {
        return $this->hasMany('App\Models\Production');
    }

    public function user()
    {
        return $this->belongsTo('App\Models\User');
    }

    public function folders()
    {
        return $this->belongsToMany('App\Folder', 'folder_list', 'creators_id', 'folder_id');

    }

    // public function folder_list()
    // {
    //     return $this->belongsToMany('App\Folder', 'folder_list', 'creators_id', 'folder_id');
    // }
}
