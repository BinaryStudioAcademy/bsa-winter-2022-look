<?php

namespace App\Policies;

use App\Models\Event;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class EventPolicy
{
    use HandlesAuthorization;

    public function viewAny(User $user): bool
    {
        return $user->getRoleId();
    }

    public function view(User $user, Event $event): bool
    {
        return $user->getRoleId();
    }

    public function create(User $user): bool
    {
        return $user->isEventOwner() || $user->isAdmin();
    }

    public function update(User $user, Event $event): bool
    {
        return $user->isEventOwner() || $user->isAdmin() || $user->isEventModerator();
    }

    public function delete(User $user, Event $event): bool
    {
        return $user->isAdmin();
    }

    public function restore(User $user, Event $event): bool
    {
        return $user->isAdmin();
    }

    public function forceDelete(User $user, Event $event): bool
    {
        return $user->isAdmin();
    }
}
