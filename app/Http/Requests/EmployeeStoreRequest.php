<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class EmployeeStoreRequest extends FormRequest
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
        $rules = [];

        switch($this->method()) {
            case 'POST': 
            {
                $rules = [
                    'first_name' => 'required|max:35',
                    'last_name' => 'required|max:35',
                    'email' => 'required|max:150|email|unique:employees',
                    'birthdate' => 'required',
                    'profile_image_path' => 'required|image',
                    'current_address' => 'required|max:200',
                    'permanent_address' => 'required|max:35'
                ];
            }

            case 'PUT': 
                {
                    $rules = [
                        'first_name' => 'required|max:35',
                        'last_name' => 'required|max:35',
                        'email' => ['required',
                            'max:150',
                            'email',
                            Rule::unique('employees', 'email')->ignore($this->employee->id)
                        ],
                        'birthdate' => 'required',
                        'current_address' => 'required|max:200',
                        'permanent_address' => 'required|max:35'
                    ];
                }

            default:
                break;
        }

        return $rules;
    }
}
