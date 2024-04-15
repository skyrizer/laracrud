<?php

namespace App\Policies;

use Illuminate\Auth\Access\Response;
use App\Models\MemoryUsage;
use App\Models\User;

class MemoryUsagePolicy
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
    public function view(User $user, MemoryUsage $memoryUsage): bool
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
    public function update(User $user, MemoryUsage $memoryUsage): bool
    {
        //
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, MemoryUsage $memoryUsage): bool
    {
        //
    }

    /**
     * Determine whether the user can restore the model.
     */
    public function restore(User $user, MemoryUsage $memoryUsage): bool
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(User $user, MemoryUsage $memoryUsage): bool
    {
        //
    }
}
