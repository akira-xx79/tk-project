<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
//決済
use Laravel\Cashier\Billable;
use Stripe\Subscription;

class Admin extends Authenticatable
{
    use Notifiable;
    use Notifiable, Billable;

    protected $table = 'admins';

    protected $fillable = [
        'company_name',
        'email',
        'user_id',
        'name',
        'password',
    ];

    protected $hidden = [
        'password', 'remember_token',
    ];

    public function user()
    {
        return $this->hasMany('App\Models\User');
    }

    // public function subscriptions()
    // {
    //     return $this->hasMany('Laravel\Cashier\Subscription');
    // }
    // public function subscriptions()
    // {
    //     return $this->hasMany('App\AdminSubscription', 'admin_id');
    // }

}
