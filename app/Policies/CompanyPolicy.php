<?php

namespace App\Policies;

use Illuminate\Auth\Access\HandlesAuthorization;
use App\User;
use App\Company;

class CompanyPolicy
{
    use HandlesAuthorization;

    public function edit(User $user, Company $company)
    {
        return $user->company_id === $company->id;
    }
}

