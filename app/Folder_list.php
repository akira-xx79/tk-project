<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\Pivot;

class Folder_list extends Pivot
{
    protected $table = 'folder_list';

    public function folder()
    {
        return $this->belongsTo('App\Folder');
    }

    public function creators()
    {
        return $this->belongsToMany('App\Models\Creator');
    }
}
