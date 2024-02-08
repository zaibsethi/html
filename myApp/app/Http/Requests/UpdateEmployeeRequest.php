<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateEmployeeRequest extends FormRequest
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
            'employee_phone' => 'required',
            'employee_gender' => 'required',
            'employee_blood_group' => 'required',
            'employee_joining_date' => 'required',
//            'employee_salary_date' => 'required',
//            'employee_salary_date' => 'required',
//            'employee_salary_date' => 'required',
//           'employee_address'=>',
//           'employee_pemc'=>',

        ];
    }

    public function messages()
    {

        return [
            'employee_phone.required' => 'Please enter phone number.',
            'employee_name.required' => 'Please enter member name.',
            'employee_gender.required' => 'Please enter gender.',
            'employee_blood_group.required' => 'Please enter blood group.',
            'employee_joining_date.required' => 'Please enter joining date.',
            'employee_salary_date.required' => 'Please enter fee date.',
        ];
    }
}
