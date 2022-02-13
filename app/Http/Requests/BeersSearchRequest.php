<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class BeersSearchRequest extends FormRequest
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
            'feeling_id' => ['required'],
            'temperature_id' => ['nullable'],
        ];
    }

    /**
     * @return string[]
     */
    public function messages()
    {
        return [
            'feeling_id.required' => '気分を選択してください',
//            'temperature_id.required_with' => '気温を選択してください',
        ];
    }
}
