<?php

namespace App\Observers;

use App\Models\Donor;
use Illuminate\Support\Str;

class DonorObserver
{
    /**
     * Handle the Donor "creating" event.
     *
     * @param  \App\Models\Donor  $donor
     * @return void
     */
    public function creating(Donor $donor)
    {
        $donor->uuid = (string) Str::uuid();
    }

    /**
     * Handle the Donor "updating" event.
     *
     * @param  \App\Models\Donor  $donor
     * @return void
     */
    public function updating(Donor $donor)
    {
        //
    }
}
