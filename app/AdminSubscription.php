<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Laravel\Cashier\Subscription;
use App\Models\Admin;

class AdminSubscription extends Subscription
{
    public function user()
    {
        return $this->belongsTo('App\Models\Admin', 'admin_id');
    }



    // public function admin()
    // {
    //     return $this->belongsTo('App\Models\Admin');
    // }
}
