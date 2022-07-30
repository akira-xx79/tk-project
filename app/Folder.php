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

    // public function folder_list()
    // {
    //     return $this->belongsToMany('App\Models\creator', 'folder_list', 'folder_id', 'creators_id' );
    // }
    public function creators()
    {
        return $this->belongsToMany('App\Models\Creator', 'folder_list', 'folder_id', 'creators_id');
    }
}
