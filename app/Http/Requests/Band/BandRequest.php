<?php

namespace App\Http\Requests\Band;

use Illuminate\Foundation\Http\FormRequest;

class BandRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;    // if there are no complication it should be 'return true'
                        // it could used as permission too
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name' => 'required|unique:bands,name,' . optional($this->band)->id,
            'thumbnail' => request('thumbnail') ? 'image|mimes:jpg,jpeg,png,gif' : '', /* cara untuk membuat if statement dengan null value */
            'genres' => 'required|array'
        ];
    }
}
