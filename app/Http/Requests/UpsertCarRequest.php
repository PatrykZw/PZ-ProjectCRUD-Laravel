<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpsertCarRequest extends FormRequest
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
            'make' => 'required|max:255',
            'model' => 'required|max:255',
            'body_shape' => 'required|max:255',
            'fuel' => 'required|max:255',
            'transmission' => 'required|max:255',
            'engine' => 'required|max:255',
            'engine_capacity' => 'required|numeric|between:0,9.9',
            'status' => 'required|max:255',
            'day_repayment' => 'required|max:255',
            'rental_date' => 'nullable|date',
            'return_date' => 'nullable|date',
            'image' => 'image|mimes:jpg,png',
        ];
    }
}
