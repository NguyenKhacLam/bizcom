<?php

namespace App\Observers;

use App\Models\Organization;
use App\Models\User;

class OrganizationObserver
{
    /**
     * Handle the User "creating" event.
     *
     * @param  \App\Models\User  $user
     * @return void
     */
    public function creating(Organization $organization)
    {
        $uk=User::makeUkString();

        $organization->uk=$uk;
    }
    /**
     * Handle the Organization "created" event.
     *
     * @param  \App\Models\Organization  $organization
     * @return void
     */
    public function created(Organization $organization)
    {
        //
    }

    /**
     * Handle the Organization "updated" event.
     *
     * @param  \App\Models\Organization  $organization
     * @return void
     */
    public function updated(Organization $organization)
    {
        //
    }

    /**
     * Handle the Organization "deleted" event.
     *
     * @param  \App\Models\Organization  $organization
     * @return void
     */
    public function deleted(Organization $organization)
    {
        //
    }

    /**
     * Handle the Organization "restored" event.
     *
     * @param  \App\Models\Organization  $organization
     * @return void
     */
    public function restored(Organization $organization)
    {
        //
    }

    /**
     * Handle the Organization "force deleted" event.
     *
     * @param  \App\Models\Organization  $organization
     * @return void
     */
    public function forceDeleted(Organization $organization)
    {
        //
    }
}
