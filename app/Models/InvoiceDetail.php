<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class InvoiceDetail extends Model
{
    use HasFactory;

    protected $fillable = [
        'invoice_id',
        'product_id',
        'qty',
        'price' ,
        'discount' ,
        'subtotal' ,
    ];

    /**
     * Get all of the comments for the InvoiceDetail
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function product(): BelongsTo
    {
        return $this->belongsTo(Product::class, 'product_id', 'id');
    }

    public function products(): HasMany
    {
        return $this->hasMany(Product::class, 'product_id', 'id');
    }

    /**
     * Get the user that owns the InvoiceDetail
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function invoice(): BelongsTo
    {
        return $this->belongsTo(Invoice::class, 'invoice_id', 'id');
    }

}
