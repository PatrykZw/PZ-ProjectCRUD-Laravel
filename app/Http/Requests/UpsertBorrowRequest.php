<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use OpenApi\Annotations as OA;

/**
 * @OA\Schema(
 *     title="UpsertBorrowRequest",
 *     description="Request data for creating/updating a borrow.",
 *     required={"rental_date", "return_date"}
 * )
 */
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
     *
     * @OA\Property(
     *     property="make",
     *     type="string",
     *     description="The make of the car being borrowed.",
     *     example="Toyota"
     * )
     * @OA\Property(
     *     property="model",
     *     type="string",
     *     description="The model of the car being borrowed.",
     *     example="Camry"
     * )
     * @OA\Property(
     *     property="body_shape",
     *     type="string",
     *     description="The body shape of the car being borrowed.",
     *     example="Sedan"
     * )
     * @OA\Property(
     *     property="rental_date",
     *     type="string",
     *     format="date",
     *     description="The rental date for the car.",
     *     example="2023-07-19"
     * )
     * @OA\Property(
     *     property="return_date",
     *     type="string",
     *     format="date",
     *     description="The return date for the car.",
     *     example="2023-07-25"
     * )
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