<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use OpenApi\Annotations as OA;

/**
 * @OA\Schema(
 *     title="UpsertCarRequest",
 *     description="Request data for creating/updating a car.",
 *     required={"make", "model", "body_shape", "fuel", "transmission", "engine", "engine_capacity", "status", "day_repayment", "rental_date", "return_date", "image"}
 * )
 */
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
     *
     * @OA\Property(
     *     property="make",
     *     type="string",
     *     description="The make of the car.",
     *     example="Toyota"
     * )
     * @OA\Property(
     *     property="model",
     *     type="string",
     *     description="The model of the car.",
     *     example="Camry"
     * )
     * @OA\Property(
     *     property="body_shape",
     *     type="string",
     *     description="The body shape of the car.",
     *     example="Sedan"
     * )
     * @OA\Property(
     *     property="fuel",
     *     type="string",
     *     description="The type of fuel used by the car.",
     *     example="Petrol"
     * )
     * @OA\Property(
     *     property="transmission",
     *     type="string",
     *     description="The transmission type of the car.",
     *     example="Automatic"
     * )
     * @OA\Property(
     *     property="engine",
     *     type="string",
     *     description="The engine type of the car.",
     *     example="V6"
     * )
     * @OA\Property(
     *     property="engine_capacity",
     *     type="number",
     *     format="float",
     *     description="The engine capacity of the car.",
     *     example=2.5
     * )
     * @OA\Property(
     *     property="status",
     *     type="string",
     *     description="The status of the car.",
     *     example="Fabric"
     * )
     * @OA\Property(
     *     property="day_repayment",
     *     type="number",
     *     description="The day repayment of the car.",
     *     example=10
     * )
     * @OA\Property(
     *     property="rental_date",
     *     type="string",
     *     format="date",
     *     description="The rental date of the car.",
     *     example="2023-07-19"
     * )
     * @OA\Property(
     *     property="return_date",
     *     type="string",
     *     format="date",
     *     description="The return date of the car.",
     *     example="2023-07-25"
     * )
     * @OA\Property(
     *     property="image",
     *     type="string",
     *     description="The image of the car.",
     *     example="car_image.jpg"
     * )
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
            'day_repayment' => 'required|max:255|numeric',
            'rental_date' => 'nullable|date',
            'return_date' => 'nullable|date',
            'image' => 'image|mimes:jpg,png',
        ];
    }
}