<?php

namespace App\Http\Requests\Web;

use Illuminate\Foundation\Http\FormRequest;

class Request extends FormRequest
{
    public function authorize()
    {
    	// Using policy for Authorization
        return true;
    }
}
