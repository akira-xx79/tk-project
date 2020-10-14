<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CreateDelivery extends Model
{
    protected $table = 'create_delivery';

    protected $tillable = ['car_name'];

    public function production()
    {
        return $this->hasOne('App\production', 'carrier_id');
    }

    public function getData()
    {
        return $this->car_name;
    }
}
