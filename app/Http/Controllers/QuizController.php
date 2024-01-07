<?php

namespace App\Http\Controllers;

use App\Http\Requests\QuizRequest;
use App\Models\Quiz;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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
}
