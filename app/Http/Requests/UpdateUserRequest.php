<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use OpenApi\Annotations as OA;

/**
 * @OA\Schema(
 *     title="UpdateUserRequest",
 *     description="Request data for updating a user.",
 *     required={"name", "email", "password", "password_confirmation"}
 * )
 */
class UpdateUserRequest extends FormRequest
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
     *     property="name",
     *     type="string",
     *     description="The name of the user.",
     *     example="John Doe"
     * )
     * @OA\Property(
     *     property="email",
     *     type="string",
     *     format="email",
     *     description="The email of the user.",
     *     example="john.doe@example.com"
     * )
     * @OA\Property(
     *     property="password",
     *     type="string",
     *     description="The new password of the user.",
     *     example="NewPassword123"
     * )
     * @OA\Property(
     *     property="password_confirmation",
     *     type="string",
     *     description="The confirmation of the new password.",
     *     example="NewPassword123"
     * )
     */
    public function rules()
    {
        return [
            'name' => 'required|max:40',
            'email' => 'required|email:rfc,dns|max:100',
            'password' => 'required|max:40|min:8|confirmed'
        ];
    }
}