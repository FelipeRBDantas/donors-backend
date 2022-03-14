<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreUpdateAccount extends FormRequest
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
            'account_type' => ['required', 'in:DÉBITO,CRÉDITO'],
            'debit_number' => ['required', 'integer'],
            'credit_bunner' => ['required', 'string'],
            'credit_first_number' => ['required', 'integer', 'digits:6'],
            'credit_final_number' => ['required', 'integer', 'digits:4'],
        ];
    }
}
