<?php

namespace App\Policies;

use App\Models\Resturant;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class ResturantPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view any models.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function viewAny(User $user)
    {
        return $user->id === auth()->user()->id;
    }

    /**
     * Determine whether the user can view the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Resturant  $resturant
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function view(User $user, Resturant $resturant)
    {
        return $user->id === $resturant->user_id;
    }

    /**
     * Determine whether the user can create models.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function create(User $user)
    {
        return $user->id === auth()->id();
    }

    /**
     * Determine whether the user can update the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Resturant  $resturant
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function update(User $user, Resturant $resturant)
    {
        return $user->id === $resturant->user_id;
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Resturant  $resturant
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function delete(User $user, Resturant $resturant)
    {
        return $user->id === $resturant->user_id;
    }

    /**
     * Determine whether the user can restore the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Resturant  $resturant
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function restore(User $user, Resturant $resturant)
    {
        return $user->id === $resturant->user_id;
    }

    /**
     * Determine whether the user can permanently delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Resturant  $resturant
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function forceDelete(User $user, Resturant $resturant)
    {
        return $user->id === $resturant->user_id;
    }
}
