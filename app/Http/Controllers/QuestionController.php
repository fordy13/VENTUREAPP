<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Question;
use App\Answer;
use App\Company;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Repositories\QuestionRepository;
use App\Repositories\AnswerRepository;

class QuestionController extends Controller
{
    protected $questions;
    protected $answers;

    public function __construct(QuestionRepository $questions, AnswerRepository $answers)
    {
        $this->questions = $questions;
        $this->answers = $answers;
    }

    public function index(Request $request)
    {
        return view('QnA.index', [
            'questions' => $this->questions->getQuestions(),
        ]);
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'title' => 'required|max:255',
        ]);

        $question = new Question;
        $question->title = $request->title;
        $question->save();

        return redirect('/questions');
    }

    public function listAnswers(Request $request, Company $company)
    {
        $users = $this->answers->getCompanysUsers($company);
        $allCompanyAnswers = collect();
        foreach ($users as $user)
        {
            foreach($this->answers->getUsersAnswers($user) as $answer)
            {
                $allCompanyAnswers->push($answer);
            }
        }
        $questions = $this->questions->getQuestions();
        $onlyRecentAnswers = collect();
        foreach ($questions as $question)
        {
            $filtered = $allCompanyAnswers->where('question_id', $question->id);
            $filtered->reverse();
            $tmp = null;
            //this loop gives me the most recent answer's created_at column for this question
            foreach ($filtered as $a)
            {
                if ((!$tmp)||($a->created_at > $tmp->created_at))
                {
                    $tmp = $a;
                }
            }
            //then I grab it and store it in $onlyRecentAnswers
            $onlyRecentAnswers->push($filtered->pull($filtered->search($tmp)));
        }


        return view('QnA.list', [
            'questions' => $questions,
            'answers' => $onlyRecentAnswers,
        ]);
    }
}
