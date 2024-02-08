<?php

namespace App\Http\Requests\Member;

use Illuminate\Foundation\Http\FormRequest;

class CreateMemberRequest extends FormRequest
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
//           'member_picture'=>',
            'member_name' => 'required',
            'member_phone' => 'required|unique:members',
//            'member_gender' => 'required',
//            'member_blood_group' => 'required',
            'member_joining_date' => 'required',
            'member_fee_start_date' => 'required',
            'member_package' => 'required',
//           'member_address'=>',
//           'member_pemc'=>',

        ];
    }

    public function messages()
    {

        return [
            'member_phone.unique' => 'Please do not enter duplicate phone number.',
            'member_name.required' => 'Please enter member name.',
            'member_gender.required' => 'Please enter gender.',
//            'member_blood_group.required' => 'Please enter blood group.',
            'member_joining_date.required' => 'Please enter joining date.',
            'member_fee_start_date.required' => 'Please enter fee date.',
            'member_package.required' => 'Please select gym package.',
        ];
    }
}
