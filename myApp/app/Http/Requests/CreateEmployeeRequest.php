<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateEmployeeRequest extends FormRequest
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
//           'employee_picture'=>',
            'employee_name' => 'required',
            'employee_phone' => 'required|unique:employees',
            'employee_gender' => 'required',
            'employee_blood_group' => 'required',
            'employee_joining_date' => 'required',
            'employee_salary_start_date' => 'required',
            'employee_package' => 'required',
//           'employee_address'=>',
//           'employee_pemc'=>',

        ];
    }

    public function messages()
    {

        return [
            'employee_phone.unique' => 'Please do not enter duplicate phone number.',
            'employee_name.required' => 'Please enter employee name.',
            'employee_gender.required' => 'Please enter gender.',
            'employee_blood_group.required' => 'Please enter blood group.',
            'employee_joining_date.required' => 'Please enter joining date.',
            'employee_salary_start_date.required' => 'Please enter fee date.',
            'employee_package.required' => 'Please select gym package.',
        ];
    }
}
