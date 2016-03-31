<?php

namespace App\Repositories;

use App\Answer;

class AnswerRepository
{
    public function getAnswers()
    {
        return Answer::orderBy('created_at', 'asc')->get();
    }
}