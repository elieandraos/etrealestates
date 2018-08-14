<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PropertyRequest extends FormRequest
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
            'title' => 'required',
            'sq_ft' => 'required|numeric|min:1',
            'amount' => 'required|numeric|min:1',
            'city' => 'required',
            'nb_bathrooms' => 'nullable|integer|min:0',
            'nb_bedrooms' => 'nullable|integer|min:0',
            'nb_parkings' => 'nullable|integer|min:0',
        ];
    }

    /**
     * Custom validation messages
     * 
     * @return type
     */
    public function messages()
    {
        return [
            'title.required' => 'The title is required',
            'sq_ft.required' => 'The square meter value is required',
            'sq_ft.numeric' => 'The square meter value must be numeric',
            'sq_ft.min' => 'The square meter value must be at least 1',
            'amount.required' => 'The square meter value is required',
            'amount.numeric' => 'The square meter value must be numeric',
            'amount.min' => 'The square meter value must be at least 1',
            'city.require' => 'The city is required',
            'nb_bathrooms.integer' => 'The nb. bathrooms value must be numeric',
            'nb_bathrooms.min' => 'The nb. bathrooms value must be at least 0',
            'nb_bedrooms.integer' => 'The nb. bedrooms value must be numeric',
            'nb_bedrooms.min' => 'The nb. bedrooms value must be at least 0',
            'nb_parkings.integer' => 'The nb. parking value must be numeric',
            'nb_parkings.min' => 'The nb. parking value must be at least 0',
        ];
    }
}
