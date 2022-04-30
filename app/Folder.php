<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Folder extends Model
{

    protected $table = 'folders';

    public function protection()
    {
        return $this->hasOne('App\Production', 'folder_id');
    }

    public function user()
    {
        return $this->hasOne('App\Models\User', 'user_id', 'id');
    }

    public function folder_list()
    {
        return $this->hasMany('App\Folder_list');
    }
}
