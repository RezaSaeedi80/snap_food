<?php

namespace App\Policies;

use App\Models\TimeWorking;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class TimeWorkingPolicy
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
        return true;
    }

    /**
     * Determine whether the user can view the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\TimeWorking  $timeWorking
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function view(User $user, TimeWorking $time)
    {
        return true;
    }

    /**
     * Determine whether the user can create models.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function create(User $user)
    {
        return true;
    }

    /**
     * Determine whether the user can update the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\TimeWorking  $timeWorking
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function update(User $user, TimeWorking $time)
    {
        return ($time) ? true : false;
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\TimeWorking  $timeWorking
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function delete(User $user, TimeWorking $timeWorking)
    {
        return false;
    }

    /**
     * Determine whether the user can restore the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\TimeWorking  $timeWorking
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function restore(User $user, TimeWorking $timeWorking)
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\TimeWorking  $timeWorking
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function forceDelete(User $user, TimeWorking $timeWorking)
    {
        //
    }
}
