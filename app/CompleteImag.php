<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CompleteImag extends Model
{

    protected $fillable = [
        'complete_id',
        'image',
    ];


    public function complete()
    {
        return $this->belongsTo('App\Complete');
    }
}
