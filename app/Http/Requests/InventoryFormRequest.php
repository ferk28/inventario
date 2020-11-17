<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class InventoryFormRequest extends FormRequest
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
            'brand'=>'min:1|max:25',
            'type'=>'min:1|max:25',
            'serial'=>'required|min:1|max:25|unique:inventories,serial',
            'model'=>'min:1|max:25',
            'value'=>'numeric',
            'features'=>'min:1|max:100',
        ];
    }
}
