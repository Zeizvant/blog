<?php

namespace App\Http\Controllers;

use App\Http\Requests\QuizRequest;
use App\Models\Quiz;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class QuizController extends Controller
{
    public function show() {
        return view('add-quiz');
    }

    public function store(QuizRequest $request){
        $user = Auth::user();
        $image = $request->file('file-upload');
		$path = $image->store('images');
		Quiz::create([
            'name'  => $request->name,
            'description' => $request->description,
            'thumbnail' =>  $path,
            'user_id' => $user->id,
		]);
        return redirect()->route('index');
    }
}
