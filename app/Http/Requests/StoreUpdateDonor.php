<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreUpdateDonor extends FormRequest
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
                    'user' => ['required', 'exists:users,uuid'],
                    'transaction' => ['required', 'exists:transactions,uuid'],
                    'cpf' => ['required', 'string'],
                    'telephone' => ['required', 'string'],
                    'birth_date' => ['required', 'string'],
                    'address' => ['required', 'string'],
                ];

                break;
            case 'PUT':
                return [
                    'cpf' => ['required', 'string'],
                    'telephone' => ['required', 'string'],
                    'birth_date' => ['required', 'string'],
                    'address' => ['required', 'string'],
                ];

                break;
        }
    }
}
