<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreSectionRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    

    public function rules()
    {
        return [
            'section_name' => 'required|string|max:255|unique:sections,section_name',
            'descrption' => 'required',
        ];
    }

    public function messages()
    {
        return [
            'section_name.required' => 'اسم القسم مطلوب.',
            'section_name.unique' => 'اسم القسم موجود.',
            'descrption.required' => 'الوصف مطلوب.',
        ];
    }
}
