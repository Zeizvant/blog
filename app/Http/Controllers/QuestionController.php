<?php

namespace App\Http\Controllers;

use App\Http\Requests\QuestionRequest;
use App\Models\Question;
use App\Models\Quiz;
use Illuminate\Http\Request;

class QuestionController extends Controller
{
    public function show(){
        $quizzes = Quiz::all();
        return view('add-question', ['quizzes' => $quizzes]);
    }

    public function store(QuestionRequest $request){
        if($request->file('file-upload') != null){
            $image = $request->file('file-upload');
		    $path = $image->store('images', 'public');
        }

        $answers = collect([
            'a' => $request->a,
            'b' => $request->b,
            'c' => $request->c,
            'd' => $request->d
        ]);
        
        Question::create([
            'question' => $request->question,
            'correct' => $request->correct,
            'position' => $request->position,
            'quiz_id' => $request->quiz,
            'answers' => $answers,
            'thumbnail' => $request->file('file-upload') ? $path : null
        ]);

        return redirect()->route('index');
    }
}
