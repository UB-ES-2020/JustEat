<?php

namespace App\Models;

use Backpack\CRUD\app\Models\Traits\CrudTrait;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class PaymentMethod extends Model
{
    use CrudTrait, HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'user_id',
    ];

    protected $table = 'payment_methods';
    // protected $primaryKey = 'id';
    // public $timestamps = false;
    protected $guarded = ['id'];
    // protected $hidden = [];
    // protected $dates = [];

    public function user()
    {
        return $this->belongsTo('App\Models\User');
    }
}
