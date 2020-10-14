<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ShipmentLocations extends Model
{
    protected $table = 'shipment_locations';

    protected $fillable = ['sl_name'];

    public function getData()
    {
        return $this->sl_name;
    }

    public function production()
    {
        return $this->hasOne('App\production', 'shipment_location_id');
    }
}
