<?php

namespace App\Policies;

use App\Models\PrbsCandidate;
use App\Models\User;
use Illuminate\Auth\Access\Response;

class PrbsCandidatePolicy
{
    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(User $user): bool
    {
        return true;
    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(User $user, PrbsCandidate $prbsCandidate): bool
    {
        return true;
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(User $user): bool
    {
        return true;
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(User $user, PrbsCandidate $prbsCandidate): bool
    {
        return false;
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, PrbsCandidate $prbsCandidate): bool
    {
        return $user->role === 'Super Administrateur';
    }

    // /**
    //  * Determine whether the user can restore the model.
    //  */
    // public function restore(User $user, PrbsCandidate $prbsCandidate): bool
    // {
    //     //
    // }

    // /**
    //  * Determine whether the user can permanently delete the model.
    //  */
    // public function forceDelete(User $user, PrbsCandidate $prbsCandidate): bool
    // {
    //     //
    // }
}
