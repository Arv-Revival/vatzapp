<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PurchaseDetail extends Model
{

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'purchase_id',
        'invoice_group_id',
        'invoice_sub_group_id',
        'invoice_item_id',
        'price',
        'qty',
        'vat_percentage',
        'amount',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'created_at',
        'updated_at',
    ];

    public function purchase()
    {
        return $this->hasOne(Purchase::class, 'id', 'purchase_id');
    }
}
