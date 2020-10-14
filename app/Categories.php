<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Categories extends Model
{
    protected $table = 'categories';

    protected $tillable = ['cat_name'];

    public function production()
    {
        return $this->hasOne('App\production', 'category_id');
    }

    public function getData()
    {
        return $this->cat_name;
    }
}
