<?php

namespace WatchBlog\Policies;

use WatchBlog\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class UserPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view the user.
     *
     * @param  \WatchBlog\User  $user
     * @param  \WatchBlog\User  $user
     * @return mixed
     */
    public function view(User $user, User $user_to_view)
    {
        return true;
    }

    /**
     * Determine whether the user can create users.
     *
     * @param  \WatchBlog\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        return true;
    }

    /**
     * Determine whether the user can update the user.
     *
     * @param  \WatchBlog\User  $user
     * @param  \WatchBlog\User  $user
     * @return mixed
     */
    public function update(User $user, User $user_to_update)
    {
        return $user->id == $user_to_update->id;
    }

    /**
     * Determine whether the user can delete the user.
     *
     * @param  \WatchBlog\User  $user
     * @param  \WatchBlog\User  $user
     * @return mixed
     */
    public function delete(User $user, User $user_to_delete)
    {
        return false;
    }

    public function before($user, $ability)
    {
        /*if ($user->isSuperAdmin()) {
            return true;
        }*/
        return null;
    }
}
