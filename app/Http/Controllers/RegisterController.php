<?php

namespace App\Http\Controllers;

use App\Http\Requests\RegisterRequest;
use App\Models\User;

class RegisterController extends Controller
{
    public function show(){
        return view('registration');
    }

    public function register(RegisterRequest $request) {

        User::create($request->validated());
        return redirect()->route('index');
    }
}
