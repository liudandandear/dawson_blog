<?php

namespace App\Http\Requests\Web;

use Illuminate\Foundation\Http\FormRequest;

class ChapterAddRequest extends FormRequest
{
    public function rules()
    {
        return [
            'title' => 'max:80',
        ];
    }

    public function messages()
    {
        return [

        ];
    }
}
