<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Model;

class Supplier extends Model
{
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'user_id',
        'trn',
        'building_name',
        'p_o_box',
        'palce',
        'city',
        'country_id',
        'region_id',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    public function user()
    {
        return $this->hasOne(User::class, 'id', 'user_id');
    }

    /**
     * Get the country.
     */
    public function country()
    {
        return $this->hasOne(Country::class, 'id', 'country_id');
    }

    /**
     * Get the region.
     */
    public function region()
    {
        return $this->hasOne(Region::class, 'id', 'region_id');
    }
}
