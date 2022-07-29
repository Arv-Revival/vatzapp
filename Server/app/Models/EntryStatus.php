<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class EntryStatus extends Model
{
    /**
     * Entry constants
     */
    public const ENTRY_PENDING = 1;
    public const ENTRY_CHECKER_IN_PROGRESS = 2;
    public const ENTRY_VALIDATOR_IN_PROGRESS = 3;
    public const ENTRY_APPROVED = 4;
    public const ENTRY_VALIDATOR_REJECTED = 5;
    /**
     * The attributes that are mass assignable.
     * @var array
     */
    protected $fillable = [
        'name', 'description',
    ];
}