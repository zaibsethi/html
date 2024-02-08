<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateEmployeePackage extends FormRequest
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
            'package_name' => 'required|max:255',
            'package_amount' => 'required',
            'package_description' => 'required',
        ];
    }

    public function messages()
    {
        return [
            'package_name.required' => 'A package name is required',
//            'package_name.unique' => 'Package name is already exists.',
            'package_amount.required' => 'A package amount is required',
//            'package_amount.unique' => 'Package amount is already exists',
            'package_description.required' => 'A package description is required',
        ];
    }
}
