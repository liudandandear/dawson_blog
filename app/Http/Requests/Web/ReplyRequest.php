<?php

namespace App\Http\Requests\Web;

class ReplyRequest extends Request
{
    public function rules()
    {
        return [
            'content' => 'required|min:2',
        ];
    }
}
