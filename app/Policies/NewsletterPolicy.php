<?php

namespace App\Policies;

use App\Models\NewsLetterSent;
use App\Models\User;
use Illuminate\Auth\Access\Response;

class NewsletterPolicy
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
    public function view(User $user, NewsLetterSent $newsLetterSent): bool
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
    public function update(User $user, NewsLetterSent $newsLetterSent): bool
    {
        return true;
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, NewsLetterSent $newsLetterSent): bool
    {
        return $user->role === 'Super Administrateur';
    }

    // /**
    //  * Determine whether the user can restore the model.
    //  */
    // public function restore(User $user, NewsLetterSent $newsLetterSent): bool
    // {
    //     //
    // }

    // /**
    //  * Determine whether the user can permanently delete the model.
    //  */
    // public function forceDelete(User $user, NewsLetterSent $newsLetterSent): bool
    // {
    //     //
    // }
}
