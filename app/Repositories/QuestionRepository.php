<?php

namespace App\Repositories;

use App\Question;

class QuestionRepository
{
    public function getQuestions()
    {
        return Question::orderBy('created_at', 'asc')->get();
    }
}