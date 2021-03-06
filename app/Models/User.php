<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Passport\HasApiTokens;
use Spatie\Permission\Traits\HasRoles;
use Backpack\CRUD\app\Models\Traits\CrudTrait;
use Illuminate\Support\Facades\Hash;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable, HasRoles, CrudTrait;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'phone',
        'sms_offers',
        'email_offers',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function addresses()
    {
        return $this->hasMany('App\Models\Address');
    }

    public function orders()
    {
        return $this->hasMany('App\Models\Order');
    }

    public function riderOrders()
    {
        return $this->hasMany('App\Models\Order', 'rider_id');
    }

    public function ratings()
    {
        return $this->hasMany('App\Models\Rating');
    }

    public function restaurants()
    {
        return $this->hasMany('App\Models\Restaurant');
    }

    public function paymentMethods()
    {
        return $this->hasMany('App\Models\PaymentMethod');
    }
}
