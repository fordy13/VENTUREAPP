<?php

namespace App\Repositories;

use App\User;
use App\Company;

class CompanyRepository
{
    /**
     * Get all of the tasks for a given user.
     *
     * @param  User  $user
     * @return Collection
     */
    public function getCompanies()
    {
        return Company::orderBy('created_at', 'asc')->get();
    }
}