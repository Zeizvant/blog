<?php

namespace App\Http\Controllers;

use App\Http\Requests\QuestionRequest;
use App\Models\Question;
use App\Models\Quiz;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Termwind\Components\Raw;

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

    public function edit(Request $request){
        $quizzes = Quiz::all();
        $question  = Question::find($request->route('id'));
        $answers = json_decode($question->answers);
        return view('question-edit', [
            'quizzes' => $quizzes,
            'question' => $question,
            'answers' => $answers
        ]);
    }

    public function update(QuestionRequest $request){
        $question = Question::find($request->route('id'));
        Storage::delete('public/' . $question->thumbnail);
        $question->question = $request->question;
        $question->correct = $request->correct;
        $question->position = $question->position;
        $answers = collect([
            'a' => $request->a,
            'b' => $request->b,
            'c' => $request->c,
            'd' => $request->d
        ]);
        $question->answers = $answers;
        if(array_key_exists('file-upload', $request->validated())){
            $image = $request->file('file-upload');
            $path = $image->store('images', 'public');
            $question->thumbnail = $path;
        }
        $question->save();
        return redirect()->route('index');
    }

    public function delete(Request $request) {
        $question = Question::find($request->route('id'));
        if($question){
            Storage::delete('public/' . $question->thumbnail);
            $question->delete();
        }
        return redirect()->back();
    }
}
