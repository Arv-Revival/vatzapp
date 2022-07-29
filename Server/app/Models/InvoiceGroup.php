<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class InvoiceGroup extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'invoice_type',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'created_at',
        'updated_at',
        'invoice_type',
    ];

    public function invoiceSubGroups()
    {
        return $this->hasMany(InvoiceSubGroup::class);
    }
}
