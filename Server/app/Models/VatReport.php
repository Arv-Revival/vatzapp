<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class VatReport extends Model
{
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'client_id',
        'status',
        'trn',
        'name',
        'building_name',
        'p_o_box',
        'palce',
        'city',
        'region',
        'country',
        'vat_return_start_period',
        'vat_return_end_period',
        'vat_return_due_date',
        'sale_amount',
        'sale_vat_amount',
        'purchase_amount',
        'purchase_vat_amount',
        'expenditure_amount',
        'expenditure_vat_amount',
        'net_vat_sale_due',
        'net_vat_purchase_due',
        'payable_tax_for_the_period',
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
        'join_date' => 'datetime',
    ];


    public function client()
    {
        return $this->hasOne(Client::class, 'id', 'user_id');
    }
  }