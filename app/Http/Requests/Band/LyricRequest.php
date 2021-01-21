<?php

namespace App\Http\Requests\Band;

use Illuminate\Foundation\Http\FormRequest;

class LyricRequest extends FormRequest
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
            'album' => 'required',
            'band' => 'required',
            'body' => 'required',
            'title' => 'required'
        ];
    }
}
