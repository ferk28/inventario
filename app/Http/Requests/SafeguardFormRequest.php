<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SafeguardFormRequest extends FormRequest
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
            'inventory_id'=>'required|unique:safeguards,inventory_id',
            'employee_id'=>'required',
        ];
    }
}
