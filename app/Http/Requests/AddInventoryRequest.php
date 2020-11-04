<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AddInventoryRequest extends FormRequest
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
            'name' => 'required',
            'model' => 'required',
            'provider' => 'required',
            'date_of_delivery' => 'required',
            'guarantee_period' => 'required'
        ];
    }
}
