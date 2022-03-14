<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Account extends Model
{
    use HasFactory;

    protected $fillable = [
        'uuid',
        'account_type',
        'debit_number',
        'credit_bunner',
        'credit_first_number',
        'credit_final_number',
    ];
}
