<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Folder_list extends Model
{
    protected $table = 'folder_list';

    public function Folder()
    {
        return $this->elongsTo('App\Folder');
    }
}
