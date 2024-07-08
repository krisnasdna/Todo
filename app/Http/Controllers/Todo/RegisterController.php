<?php

namespace App\Http\Controllers\Todo;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class RegisterController extends Controller
{
    public function index()
    {
       return view('register');
    }

    public function register(Request $request){
        $data = [
            'name'=> $request->input('name'),
            'email'=> $request->input('email'),
            'password'=>$request->input('password'),
        ];
        User::create($data);
        return redirect()->route('login')->with('success', 'Berhasil melakukan registarasi');
    }

}
