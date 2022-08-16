<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function login (){
        return view('login');
    }

    public function store(Request $request){
       
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);
        
        if(Auth::attempt($credentials)){
            $request->session()->regenerate();
            
            
            return redirect()->intended('dashboard');
        }
        return back()->withErrors([
            'email' => 'Данный пользователь не найден',
        ]);
       
    }
}
