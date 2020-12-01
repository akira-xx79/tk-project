<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Production extends Model
{
    protected $table = 'production';

    protected $guarded = ['id'];


    const COMPLETED = [
        '未着手' => ['label' => '未着手', 'class' => 'label-danger'],
        '完了' => ['label' => '完了', 'class' => 'label-success'],
    ];

    public function getCompletedClassAttribute()
    {
        $completed = $this->attributes['completed'];

        if(!isset(self::COMPLETED[$completed])) {
            return '';
        }

        return self::COMPLETED[$completed]['class'];
    }

    public function user()
    {
        return $this->belongsTo('App\Models\User', 'user_id');
    }

    public function categries()
    {
        return $this->belongsTo('App\Categories', 'category_id');
    }

    public function createdelivery()
    {
        return $this->belongsTo('App\CreateDelivery', 'carrier_id');
    }

    public function materiaries()
    {
        return $this->belongsTo('App\Materiaries', 'materiar_id');
    }

    public function shipmentlocations()
    {
        return $this->belongsTo('App\ShipmentLocations', 'shipment_location_id');
    }

    public function complete()
    {
        return $this->hasOne('App\Complete');
    }

    public function folder()
    {
        return $this->belongsTo('App\Folder', 'folder_id');
    }

    public function creator()
    {
        return $this->belongsTo('App\Models\Creator');
    }

}
