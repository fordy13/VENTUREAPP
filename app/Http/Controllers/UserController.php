<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\User;
use App\Repositories\UserRepository;

class UserController extends Controller
{
    protected $users;

    public function __construct(UserRepository $users)
    {
        $this->users = $users;
    }

    public function editView(Request $request, User $user)
    {
        return view('users.edit', [
            'user' => $user, 
        ]);
    }

    public function edit(Request $request, User $user)
    {
        $this->validate($request, [
            'name' => 'required|max:255',
        ]);

        $user->name = $request->name;
        $user->email = $request->email;
        $user->save();

        return redirect('/companies');
    }
}
