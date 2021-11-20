<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Setting extends Model
{
    use HasFactory;

    protected $guarded = [];

    // protected $fillable = [
    //     'company_name',
    //     'company_email',
    //     'company_phone',
    //     'invoice_initial_value',
    // ];
}
