<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function show(){
        return view('login');
    }

    public function login(LoginRequest $request){
        if(Auth::attempt($request->validated())){
            return redirect()->route('index');
        }
    }

    public function logout(){
        Auth::logout();
        return redirect()->route('login');
    }
}
