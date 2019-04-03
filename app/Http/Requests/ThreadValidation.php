<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ThreadValidation extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'thread_name' => 'required|min:3|max:255',
            'content' => 'required'
        ];
    }

    /**
     * Get messages if request not validated
     *
     * @return array
     */
    public function messages()
    {
        return [
            'thread_name.required'=>"Thread name can't be empty",
            'content.required'=>"Content can't be empty"
        ];
    }
}
