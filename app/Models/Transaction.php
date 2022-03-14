<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    use HasFactory;

    protected $fillable = [
        'uuid',
        'account_id',
        'donation_interval',
        'donation_amount',
        'form_of_payment',
    ];

    public function accounts()
    {
        return $this->hasMany(Account::class, 'id', 'account_id');
    }
}
