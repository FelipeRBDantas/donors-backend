<?php

namespace App\Observers;

use App\Models\Transaction;
use Illuminate\Support\Str;

class TransactionObserver
{
    /**
     * Handle the Transaction "creating" event.
     *
     * @param  \App\Models\Transaction  $transaction
     * @return void
     */
    public function creating(Transaction $transaction)
    {
        $transaction->uuid = (string) Str::uuid();
    }

    /**
     * Handle the Transaction "updating" event.
     *
     * @param  \App\Models\Transaction  $transaction
     * @return void
     */
    public function updating(Transaction $transaction)
    {
        //
    }
}
