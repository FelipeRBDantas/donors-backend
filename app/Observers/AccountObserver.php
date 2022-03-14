<?php

namespace App\Observers;

use App\Models\Account;
use Illuminate\Support\Str;

class AccountObserver
{
    /**
     * Handle the Account "creating" event.
     *
     * @param  \App\Models\Account  $account
     * @return void
     */
    public function creating(Account $account)
    {
        $account->uuid = (string) Str::uuid();
    }

    /**
     * Handle the Account "updating" event.
     *
     * @param  \App\Models\Account  $account
     * @return void
     */
    public function updating(Account $account)
    {
        //
    }
}
