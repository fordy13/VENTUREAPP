<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class QuestionController extends Controller
{
    public function index(Request $request)
    {
        return view('QnA.index');//, 
        //     [
        //     'conversations' => $this->conversations->forUser($request->user()),
        // ]);
    }
}
