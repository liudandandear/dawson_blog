<?php

namespace App\Http\Requests\Web;

use Illuminate\Foundation\Http\FormRequest;

class BookRequest extends FormRequest
{
    public function rules()
    {
        return [
            'cover' => 'mimes:jpeg,bmp,png,gif|dimensions:min_width=200,min_height=200'
        ];
    }

    public function messages()
    {
        return [
            'cover.dimensions' => '图片的清晰度不够，宽和高需要 200px 以上'
        ];
    }
}
