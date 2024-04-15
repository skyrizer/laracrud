<?php

namespace App\Policies;

use Illuminate\Auth\Access\Response;
use App\Models\NodeConfig;
use App\Models\User;

class NodeConfigPolicy
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
    public function view(User $user, NodeConfig $nodeConfig): bool
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
    public function update(User $user, NodeConfig $nodeConfig): bool
    {
        //
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, NodeConfig $nodeConfig): bool
    {
        //
    }

    /**
     * Determine whether the user can restore the model.
     */
    public function restore(User $user, NodeConfig $nodeConfig): bool
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(User $user, NodeConfig $nodeConfig): bool
    {
        //
    }
}
