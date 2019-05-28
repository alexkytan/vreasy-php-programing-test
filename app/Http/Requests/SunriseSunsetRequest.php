<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SunriseSunsetRequest extends FormRequest
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
            'cityName' => 'required_without:lng,lat|string',
            'date' => 'string',
            'lat' => 'required_with:lng|numeric|between:-90,90',
            'lng' => 'required_with:lat|numeric|between:-180,180',
            'timezone' => 'timezone',
        ];
    }
}
