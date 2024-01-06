<?php

namespace App\Http\Controllers;

use App\Models\Quiz;
use Illuminate\Http\Request;

class QuestionController extends Controller
{
    public function show(){
        $quizzes = Quiz::all();
        return view('add-question', ['quizzes' => $quizzes]);
    }
}
