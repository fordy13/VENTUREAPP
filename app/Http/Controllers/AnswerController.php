<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Answer;
use App\Question;
use App\User;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Repositories\AnswerRepository;

class AnswerController extends Controller
{
    protected $answers;

    public function __construct(AnswerRepository $answers)
    {
        $this->middleware('auth');
        $this->answers = $answers;
    }

    public function store(Request $request, Question $question)
    {
        $this->validate($request, [
            'value' => 'required|max:255',
        ]);

        $answer = new Answer;
        $answer->user_id = $request->user()->id;
        $answer->question_id = $question->id;
        $answer->value = $request->value;
        $answer->save();

        return redirect('/questions');
    }
}
