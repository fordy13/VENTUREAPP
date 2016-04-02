<?php

namespace App\Repositories;

use App\Answer;
use App\Company;
use App\User;
use App\Question;

class AnswerRepository
{
    public function getCompanysUsers(Company $company)
    {
        return User::where('company_id', $company->id)->get();
    }

    public function getUsersAnswers(User $user)
    {
        return Answer::where('user_id', $user->id)->get();
    }
}