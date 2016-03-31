<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Question;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Repositories\QuestionRepository;

class QuestionController extends Controller
{
    protected $questions;

    public function __construct(QuestionRepository $questions)
    {
        $this->questions = $questions;
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
}
