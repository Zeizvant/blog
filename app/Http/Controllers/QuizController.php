<?php

namespace App\Http\Controllers;

use App\Http\Requests\QuizRequest;
use App\Http\Requests\QuizUpdateRequest;
use App\Models\Quiz;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

use function Laravel\Prompts\alert;

class QuizController extends Controller
{
    public function show() {
        return view('add-quiz');
    }

    public function store(QuizRequest $request){
        $user = Auth::user();
        $image = $request->file('file-upload');
		$path = $image->store('images', 'public');
		Quiz::create([
            'name'  => $request->name,
            'description' => $request->description,
            'thumbnail' =>  $path,
            'user_id' => $user->id,
		]);
        return redirect()->route('index');
    }

    public function index() {
        return view('index', [
            'quizzes' => Quiz::all()
        ]);
    }

    public function info(Request $request){
        $quiz  = Quiz::find($request->route('id'));
        $questions = $quiz->questions;
        return view('quiz', [
            'quiz' => $quiz,
            'questions' => $questions
        ]);
    }

    public function toggle(Request $request){
        $quiz = Quiz::find($request->route('id'));
        $quiz->active ? $quiz->active = false : $quiz->active = true;
        $quiz->save();

        return redirect()->back();
    }

    public function delete(Request $request) {
        $quiz = Quiz::find($request->route('id'));
        if($quiz){
            Storage::delete('public/' . $quiz->thumbnail);
            $quiz->delete();
        }
        return redirect()->route('index');
    }
    public function edit(Request $request){
        $quiz = Quiz::find($request->route('id'));
        return view('quiz-edit', [
            'quiz' => $quiz
        ]);
    }

    public function update(QuizUpdateRequest $request){
        if(array_key_exists('file-upload', $request->validated())){
            $image = $request->file('file-upload');
            $path = $image->store('images', 'public');
            $quiz = Quiz::find($request->route('id'));
            Storage::delete('public/' . $quiz->thumbnail);
            $quiz->name = $request->name;
            $quiz->description = $request->description;
            $quiz->thumbnail = $path;
            $quiz->save();
            return redirect()->route('index');
        }else{
            $quiz = Quiz::find($request->route('id'));
            $quiz->name = $request->name;
            $quiz->description = $request->description;
            $quiz->save();
            return redirect()->route('index');
        }
    }
}
