<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Complete extends Model
{

    protected $fillable = [
        'production_id',
        'creator_id',
        'lead_time',
        'comment',
    ];

    public function production()
    {
        return $this->hasMany('App\production');
    }

    public function creator()
    {
        return $this->belongsTo('App\Models\Creator');
    }

    public function completeImag()
    {
        return $this->hasMany('App\Completeimag');
    }
}
