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
class CommentRequest extends FormRequest
{

    /**
     * Rules for validations
     *
     * @return array
     */
    public function rules()
    {
        $rules = [
            
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
