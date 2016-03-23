<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Conversation;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Repositories\ConversationRepository;

class ConversationController extends Controller
{
    protected $conversations;

    public function __construct(ConversationRepository $conversations)
    {
        $this->middleware('auth');

        $this->conversations = $conversations;
    }

    public function index(Request $request)
    {
        return view('conversations.index', [
            'conversations' => $this->conversations->forUser($request->user()),
        ]);
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|max:255',
        ]);

        $request->user()->conversations()->create([
            'name' => $request->name,
        ]);

        return redirect('/conversations');
    }

    public function edit(Request $request, Conversation $conversation)
    {
        $this->authorize('edit', $conversation);

        $conversation->name = $request->name;
        $conversation->save();

        return redirect('/conversations');
    }

    public function editView(Request $request, Conversation $conversation)
    {
        return view('conversations.edit', [
            'conversation' => $conversation,
        ]);
    }
}
