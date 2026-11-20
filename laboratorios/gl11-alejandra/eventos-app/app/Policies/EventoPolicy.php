<?php

namespace App\Policies;

use App\Models\Evento;
use App\Models\User;

class EventoPolicy
{
    public function before(User $user, string $ability): ?bool
    {
        return $user->esAdmin() ? true : null;
    }

    public function viewAny(User $user): bool
    {
        return true;
    }

    public function view(User $user, Evento $evento): bool
    {
        return true;
    }

    public function create(User $user): bool
    {
        return $user->esAdmin();
    }

    public function update(User $user, Evento $evento): bool
    {
        return $user->id === (int) $evento->user_id;
    }

    public function delete(User $user, Evento $evento): bool
    {
        return $user->id === (int) $evento->user_id;
    }
}