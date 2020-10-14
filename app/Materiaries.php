<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Materiaries extends Model
{
    protected $table = 'materiaries';

    protected $fillable = ['mat_name'];

    public function production()
    {
        return $this->hasOne('App\production', 'materiar_id');
    }
}
