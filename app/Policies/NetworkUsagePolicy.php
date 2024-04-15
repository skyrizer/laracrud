<?php

namespace App\Policies;

use Illuminate\Auth\Access\Response;
use App\Models\NetworkUsage;
use App\Models\User;

class NetworkUsagePolicy
{
    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(User $user): bool
    {
        //
    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(User $user, NetworkUsage $networkUsage): bool
    {
        //
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(User $user): bool
    {
        //
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(User $user, NetworkUsage $networkUsage): bool
    {
        //
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, NetworkUsage $networkUsage): bool
    {
        //
    }

    /**
     * Determine whether the user can restore the model.
     */
    public function restore(User $user, NetworkUsage $networkUsage): bool
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(User $user, NetworkUsage $networkUsage): bool
    {
        //
    }
}
