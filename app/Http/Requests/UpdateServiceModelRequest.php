<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateServiceModelRequest extends FormRequest
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
        $method = $this->method();
        if ($method == 'PATCH') {
            return [
                'bicycle_id'  => ['sometimes', 'required'],
                'user_id'  => ['sometimes', 'required'],
                'path_id'  => ['sometimes', 'required'],
                'recent_activity_id'  => ['sometimes', 'required'],
                'temp_key'  => ['sometimes', 'required']
            ];
        }
    }
}
