<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
//監視インターフェイス
use OwenIt\Auditing\Contracts\Auditable;
//決済
use Laravel\Cashier\Billable;


class User extends Authenticatable implements Auditable
{
    use Notifiable;
    use \OwenIt\Auditing\Auditable;
    use Notifiable,Billable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'admin_id',
        'name',
        'user_id',
        'email',
        'password'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function Production()
    {
        return $this->hasMany('App\Production');
    }

    public function folders()
    {
        return $this->hasMany('App\Folder');
    }

    public function SupplyMaterial()
    {
        return $this->hasMany('App\SupplyMaterial');
    }

    public function admin()
    {
        return $this->belongsTo('App\Models\Admin');
    }

    public function creator()
    {
        return $this->hasMany('App\Models\Creator');
    }

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
}
