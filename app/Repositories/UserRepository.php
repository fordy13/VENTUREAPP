<?php

namespace App\Repositories;

use App\User;

class UserRepository
{
    /**
     * Get all of the tasks for a given user.
     *
     * @param  User  $user
     * @return Collection
     */
    public function getUsers()
    {
        return User::orderBy('created_at', 'asc')->get();
    }
}