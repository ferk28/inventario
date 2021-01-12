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
            'brand'=>'required|min:1|max:50',
            'quantity' => 'numeric',
            'type'=>'required|min:1|max:50',
            'model'=>'required|min:1|max:50',
            'unity' => 'min:1|max:20',
            'color' => 'min:1|max:20',
            //'serial'=>'min:1|max:25',
            'value'=>'required|numeric',
            'feature'=>'required|min:1|max:100',
            'size'=>'min:1|max:100',
            'description'=>'min:1|max:100',
            'user_id'=>'min:1|max:100',
        ];
    }
}
