<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function form(){

        return view('login');  
    }
    public function login(LoginRequest $request){
        $credentials = [
            'email' => $request->validated('login'),
            'password' => $request->validated('password'),
        ];
        
        if (Auth::attempt($credentials, $request->boolean('remember_me'))) {
            $request->session()->regenerate();

            return redirect()->intended('/');
        }
        return back()->withErrors([
            'password' => 'Login lub hasło nie są poprawne.'
        ]);
    }
    public function logout(Request $request){
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/')->with('success', 'Pomyślnie wylogowano');

    }
}
