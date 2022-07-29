<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    /**
     * Role constants
     */
    public const ROLE_SUPER_ADMIN = 1;
    public const ROLE_ADMIN = 2;
    public const ROLE_CHECKER = 3;
    public const ROLE_VALIDATOR = 4;
    public const ROLE_CLIENT = 5;
    public const ROLE_SUPPLIER = 6;
    
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'description',
    ];
}
