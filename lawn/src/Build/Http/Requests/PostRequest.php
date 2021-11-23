<?php

namespace Tkusa\Lawn\Http\Requests;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Exceptions\HttpResponseException;

/**
 *  Validation class
 */
class PostRequest extends FormRequest
{

    /**
     * Rules for validations
     *
     * @return array
     */
    public function rules()
    {
        $rules = [
            "title" => ["string", "nullable", "max:255", ],
        "contents" => ["string", "required", "max:5000", ],
        
        ];

        return $rules;
    }

    /**
    * Customized validation error messages
    */
    public function messages()
    {
        $messages = [];
        return $messages;
    }

}

