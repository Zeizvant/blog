<?php

namespace App\Http\Controllers;

use App\Models\Quiz;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function show() {
        return view('dashboard', [
            'quizzes' => Quiz::all()
        ]);
    }
}
