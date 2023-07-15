<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpsertBorrowRequest extends FormRequest
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
            'make' => 'nullable|max:255',
            'model' => 'nullable|max:255',
            'body_shape' => 'nullable|max:255',
            'rental_date' => 'required|date',
            'return_date' => 'required|date'
        ];
    }
}
