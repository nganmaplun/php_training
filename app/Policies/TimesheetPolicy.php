<?php

namespace App\Policies;

use App\Models\Timesheet;
use App\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class TimesheetPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view any timesheets.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    public function viewAny(User $user)
    {
        return $user->hasRole('admin');
    }

    /**
     * Determine whether the user can update the timesheet.
     *
     * @param  \App\User  $user
     * @param  \App\Timesheet  $timesheet
     * @return mixed
     */
    public function update(User $user, Timesheet $timesheet)
    {
        return $user->id == $timesheet->user_id;
    }

    /**
     * Determine whether the user can delete the timesheet.
     *
     * @param  \App\User  $user
     * @param  \App\Timesheet  $timesheet
     * @return mixed
     */
    public function delete(User $user, Timesheet $timesheet)
    {
        return $user->id == $timesheet->user_id;
    }

    public function export(User $user)
    {
        return $user->hasRole('admin');
    }

    public function viewTeam(User $user)
    {
        return $user->hasRole('manager');
    }

}
