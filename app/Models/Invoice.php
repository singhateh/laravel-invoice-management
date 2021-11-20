<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Invoice extends Model
{
    use HasFactory;

    protected $fillable = [
        'email',
        'invoice_date',
        'invoice_due_date',
        'subtotal' ,
        'shipping' ,
        'discount' ,
        'vat' ,
        'total' ,
        'notes' ,
        'invoice_type' ,
        'status' ,
    ];

    protected $cast = [
        'invoice_date'=> 'datetime',
        'invoice_due_date'=> 'datetime',
    ];

    /**
     * Get the user that owns the Invoice
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function customer(): BelongsTo
    {
        return $this->belongsTo(Customer::class, 'email', 'email');
    }

    /**
     * Get all of the comments for the Invoice
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function invoiceDetails(): HasMany
    {
        return $this->hasMany(InvoiceDetail::class, 'invoice_id', 'id');
    }
}
