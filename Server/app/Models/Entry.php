<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Entry extends Model
{
    use HasFactory, Notifiable;

    /**
     * Entry constants
     */
    public const SALE_ENTRY = 1;
    public const PURCHASE_ENTRY = 2;
    public const EXPENDITURE_ENTRY = 3;

    /**
     * The attributes that are mass assignable.
     * Entry Type
     * 1. Sale
     * 2. Purchase
     * 3. Expenditure
     *
     * @var array
     */
    protected $fillable = [
        'client_user_id',
        'file_id',
        'entry_status_id',
        'entry_type',
        'comment',
        'requested_for_delete',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'updated_at',
        'deleted_at',
    ];

    public function clientUser()
    {
        return $this->hasOne(User::class, 'id', 'client_user_id');
    }

    public function file()
    {
        return $this->hasOne(File::class, 'id', 'file_id');
    }

    public function entryStatus()
    {
        return $this->hasOne(EntryStatus::class, 'id', 'entry_status_id');
    }
}
