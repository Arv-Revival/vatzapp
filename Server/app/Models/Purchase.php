<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Purchase extends Model
{

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'entry_id',
        'supplier_id',
        'invoice_date',
        'invoice_number',
        'sub_total',
        'discount',
        'vat_amount',
        'total_amount',
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

    public function supplier()
    {
        return $this->hasOne(Supplier::class, 'id', 'supplier_id');
    }

    public function details()
    {
        return $this->hasMany(PurchaseDetail::class, 'purchase_id', 'id');
    }
}
