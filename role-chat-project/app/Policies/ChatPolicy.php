<?php

namespace App\Policies;

use App\Models\Chat;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class ChatPolicy
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
        //
        return true;
    }

    /**
     * Determine whether the user can view the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Chat  $chat
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function view(User $user, Chat $chat)
    {
        //
        if ($user->hasRole('admin') || $user->hasPermissionTo('chat_read_all')) {
            return true;
        }

        return $user->id === $chat->sender_id || $user->id === $chat->receiver_id;
    }

    public function viewAll(User $user)
    {
        return $user->hasRole('admin') || $user->hasPermissionTo('chat_read_all');
    }

    /**
     * Determine whether the user can create models.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function create(User $user)
    {
        //
        return true;
    }

    /**
     * Determine whether the user can update the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Chat  $chat
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function update(User $user, Chat $chat)
    {
        //
        return $user->hasRole('admin') || $user->id === $chat->sender_id;
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Chat  $chat
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function delete(User $user, Chat $chat)
    {
        //
        return $user->hasRole('admin') || $user->id === $chat->sender_id;
    }

    /**
     * Determine whether the user can permanently delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Chat  $chat
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function forceDelete(User $user, Chat $chat)
    {
        //
        return $user->hasRole('admin') || $user->hasPermissionTo('chat_read_all');
    }
}
