<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;

class ProductSetDataRequest extends FormRequest
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
     * @return array<string, ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            'phone_name' => ['required', 'string', 'max:255'],
            'seller_id' => ['required', 'integer', 'exists:sellers,id'],
            'display_size' => ['required', 'integer'],
            'quantity' => ['required', 'integer'],
            'cost' => ['required', 'numeric'],
        ];
    }
}
