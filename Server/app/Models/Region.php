<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Region extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'country_id',
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

    /**
     * Region's country_id
     *
     * @return \Illuminate\Database\Eloquent\Relations\belongsTo
     */
    public function countries()
    {
        return $this->belongsTo(Country::class, 'country_id');
    }
}
