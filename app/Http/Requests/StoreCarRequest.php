<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreCarRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            'name' => 'required|min:1|max:255',
            'import_price' => 'required|numeric|min:1|max:9999999999',
            'export_price' => 'required|numeric|min:1|max:9999999999',
            'model' => 'required',
            'color' => 'required',
            'fueltype' => 'required',
            'year' => 'required|numeric|min:1900|max:2100',
            'sittingfor' => 'required|numeric|min:1|max:30',
            'transmission_type' => 'required|min:1|max:255',
            'width' => 'required|numeric|min:1000|max:10000',
            'height' => 'required|numeric|min:1000|max:10000',
            'length' => 'required|numeric|min:1000|max:10000',
            'wheelbase' => 'required|numeric|min:1|max:10000',
            'combined' => 'required|numeric|min:1|max:100',
            'motorway' => 'required|numeric|min:1|max:100',
            'urban' => 'required|numeric|min:1|max:100',
            'emission_co2' => 'required|numeric|min:1|max:1500',
            'engine_size' => 'required|numeric|min:1|max:100',
            'maxKw' => 'required|numeric|min:1|max:5000',
            'maxHp' => 'required|numeric|min:1|max:5000',
            'acceleration' => 'required|numeric|min:1|max:5000',

            // 'status' => 'required',
            'brand_id' => 'required',
            'car_category_id' => 'required'
        ];
    }
}
