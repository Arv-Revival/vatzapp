<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class InvoiceSubGroup extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'invoice_group_id',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'created_at',
        'updated_at',
        'invoice_group_id',
    ];

    public function invoiceItems()
    {
        return $this->hasMany(InvoiceItem::class);
    }
}
