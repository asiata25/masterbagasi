<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateVoucherRequest extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'active_at' => ['date', 'after:today'],
            'expired_at' => ['date', 'after:active_at'],
            'amount' => ['integer', 'gt:0'],
            'status' => ['in:upcoming,active,expired']
        ];
    }
}
