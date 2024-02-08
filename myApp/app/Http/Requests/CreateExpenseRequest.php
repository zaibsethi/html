<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateExpenseRequest extends FormRequest
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
            'expense_title' => 'required',
            'expense_amount' => 'required',
            'expense_description' => 'required',
        ];
    }

    public function messages()
    {
        return [
            'expense_title.required' => 'Expense title required',
            'expense_amount.required' => 'Expense amount required',
            'expense_description.required' => 'Expense description required',
        ];
    }
}
