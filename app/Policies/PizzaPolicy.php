<?php

namespace App\Policies;

use App\Models\Pizza;
use App\Models\User;
use Illuminate\Auth\Access\Response;

class PizzaPolicy
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
    public function view(User $user, Pizza $pizza): bool
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
    public function update(User $user, Pizza $pizza): bool
    {
        return $pizza->user()->is($user);
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, Pizza $pizza): bool
    {
        return $this->update($user, $pizza);
    }

    /**
     * Determine whether the user can restore the model.
     */
    public function restore(User $user, Pizza $pizza): bool
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(User $user, Pizza $pizza): bool
    {
        //
    }
}
