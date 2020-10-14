<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SupplyMaterial extends Model
{
    protected $table = 'supply_materials';
    protected $fillable = [
        'user_id',
        'payee',
        'date',
        'comment',
        'image'
    ];

    public function user()
    {
        return $this->belongsTo('App\Models\User');
    }


}
