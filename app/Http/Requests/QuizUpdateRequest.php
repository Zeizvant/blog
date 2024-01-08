<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class QuizUpdateRequest extends FormRequest
{

    public function rules(): array
    {
        return [
            'name'  => 'required',
            'description' => 'required',
            'file-upload' =>  ''
        ];
    }
}
