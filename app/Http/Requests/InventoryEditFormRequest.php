<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class InventoryEditFormRequest extends FormRequest
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
            'brand'=>'required|min:1|max:25',
            'type'=>'required|min:1|max:25',
            'serial'=>'required|min:1|max:25',
            'model'=>'required|min:1|max:25',
            'value'=>'required|numeric',
            'features'=>'required|min:1|max:100',
        ];
    }
}
