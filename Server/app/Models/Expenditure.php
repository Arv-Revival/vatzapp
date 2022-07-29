<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Expenditure extends Model
{
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'entry_id',
        'invoice_date',
        'amount',
        'comments',
        'vat_amount',
        'invoice_number',
        'invoice_group_id',
        'invoice_sub_group_id',
        'invoice_item_id',
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
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'invoice_date' => 'datetime',
    ];

    public function entry()
    {
        return $this->hasOne(Entry::class, 'id', 'entry_id');
    }
}
