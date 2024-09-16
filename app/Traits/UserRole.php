<?php

namespace App\Traits;

use App\Enums\Role;

trait UserRole
{
    public function isAdmin(): bool
    {
        return $this->role === Role::Admin;
    }

    public function isUser(): bool
    {
        return $this->role === Role::User;
    }
}
