<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreUpdateTransaction extends FormRequest
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
        $method = $this->method();

        switch ($method) {
            case 'POST':
                return [
                    'account' => ['required', 'exists:accounts,uuid'],
                    'donation_interval' => ['required', 'in:ÚNICO,BIMESTRAL,SEMESTRAL,ANUAL'],
                    'donation_amount' => ['required', 'numeric', 'regex:/^\d+(\.\d{1,2})?$/'],
                    'form_of_payment' => ['required', 'in:DÉBITO,CRÉDITO'],
                ];

                break;
            case 'PUT':
                return [
                    'donation_interval' => ['required', 'in:ÚNICO,BIMESTRAL,SEMESTRAL,ANUAL'],
                    'donation_amount' => ['required', 'numeric', 'regex:/^\d+(\.\d{1,2})?$/'],
                    'form_of_payment' => ['required', 'in:DÉBITO,CRÉDITO'],
                ];

                break;
        }
    }
}
