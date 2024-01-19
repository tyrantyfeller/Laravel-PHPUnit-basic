<?php

namespace App\Http\Validation;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class StorePostSunriseSunset extends FormRequest {

    public function rules(): array
    {
        return [
            'latitude' => ['required', 'numeric'],
            'longitude' => ['required', 'numeric'],
            'type' => ['required', Rule::in(['sunrise', 'sunset'])]
        ];
    }

    public function messages(): array
    {
        return [
            'latitude.required' => 'Latitude is required',
            'latitude.numeric' => 'Latitude value must be numeric.',
            'longitude.required' => 'Longitude is required',
            'longitude.numeric' => 'Longitude value must be numeric',
            'type.type' => 'Longitude is required',
        ];
    }
}
