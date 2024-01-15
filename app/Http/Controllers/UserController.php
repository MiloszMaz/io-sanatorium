<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class UserController extends Controller
{
    public function login(): View
    {
        return view('user.login');
    }

    public function auth(): RedirectResponse
    {
        $login = Request::get('login');
        $password = Request::get('password');

        if($login && $password && Auth::attempt(['email' => $login, 'password' => $password, 'active' => 1])) {
            session()->flash('success', 'Zalogowano');
            return redirect('/');
        }

        session()->flash('error', 'Niepoprawne dane logowania');

        return redirect('/user/login');
    }

    public function logout(Request $request): RedirectResponse
    {
        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }
}