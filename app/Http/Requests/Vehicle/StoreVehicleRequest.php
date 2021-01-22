<?php

namespace App\Http\Requests\Vehicle;

use Illuminate\Foundation\Http\FormRequest;

class StoreVehicleRequest extends FormRequest
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
            'identity_card' => 'required|string',
            'name' => 'required|string|min:3',
            'license_plate' => 'required|string|min:7',
            'brand' => 'required|string|min:4',
            'type' => 'required|string|min:4'
        ];
    }
}
