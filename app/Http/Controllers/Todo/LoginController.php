<?php

namespace App\Http\Controllers\Todo;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class LoginController extends Controller
{
    public function login()
    {
        if(Auth::check()){
            return redirect('todo');
        }
        else{
            return view('login');
        }
    }

    public function authenticate(Request $request){
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);
 
        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
 
            return redirect()->intended('/');
        }
        else{
            Session::flash('error', 'Email atau Password Salah');
            return redirect('login');
        }
    }

    public function logout(){
        Auth::logout();
        return redirect('/login');
    }
}
