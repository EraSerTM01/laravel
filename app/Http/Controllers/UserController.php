<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{


    public function checkActive(Request $request)
    {
        $numbers = [1, 2, 3, 4, 5];

        if ($request->has('name')) {
            $user = $request->input('name');
            if (Auth::user()?->name == $user) {
                $result = 'active';
            } else {
                $result = 'inactive';
            }

            return view('checkActive', ['name' => $user, 'result' => $result, 'numbers' => $numbers]);
        } else {
            return redirect('/');
        }
    }

    public function login(Request $request)
    {
        $incomingFields = $request->validate([
            'loginname' => 'required',
            'loginpassword' => 'required'
        ]);

        if (auth()->attempt(['name' => $incomingFields['loginname'], 'password' => $incomingFields['loginpassword']])) {
            $request->session()->regenerate();
        }

        return redirect('/');
    }


    public function logout()
    {
        auth()->logout();
        return redirect('/');
    }


    public function register(Request $request)
    {
        $incomingFields = $request->validate([
            'name' => ['required', 'min:4', 'max:15', Rule::unique('users', 'name')],
            'email' => ['required', 'email', Rule::unique('users', 'email')],
            'password' => ['required', 'min:6', 'max:200']

        ]);
        $incomingFields['password'] = bcrypt($incomingFields['password']);
        $user = User::create($incomingFields);
        auth()->login($user);
        return redirect('/');


        return 'Hello from our controller!';
    }

    public function getUser(Request $request, User $user)
    {
        return $user->articles()->get();
    }
}
