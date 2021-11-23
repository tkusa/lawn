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
            "title" => ["string", "required", "max:255", ],
        "contents" => ["string", "required", ],
        "like" => ["integer", "required", "min: 0", ],
        
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

