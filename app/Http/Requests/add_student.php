<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class add_student extends FormRequest
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
            'name' =>'required|min:3|max:32'
        ];
    }
    public function messages()
    {
        return [
            'name.required' => 'bạn cần phải nhập một tên',
            'name.min'  => 'tên phải có kích thước từ 3 đến 32 kí tự',
            'name.max' =>'tên phải có kích thước từ 3 đến 32 kí tự'
        ];
    }
}
