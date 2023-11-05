<?php

namespace App\Http\Requests\V1;

use Illuminate\Foundation\Http\FormRequest;

class UpdateWeatherRequest extends FormRequest
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
        $method = $this->method();
        if ($method == 'PUT') {
            return [
                'recentActivityId' => ['required'],
                'windSpeed' => ['required'],
                'temperature' => ['required'],
                'visibility' => ['required'],
                'humidity' => ['required'],
                'weatherStatus' => ['required'],
            ];
        } else {
            return [
                'recentActivityId' => ['sometimes','required'],
                'windSpeed' => ['sometimes','required'],
                'temperature' => ['sometimes','required'],
                'visibility' => ['sometimes','required'],
                'humidity' => ['sometimes','required'],
                'weatherStatus' => ['sometimes','required'],
            ];
        }
    }

    protected function prepareForValidation()
    {
        $data = [
            'recent_activity_id' => $this->recentActivityId ? $this->recentActivityId: null,
            'weather_status' => $this->weatherStatus ? $this->weatherStatus: null,
            'wind_speed' => $this->windSpeed ? $this->windSpeed: null,
        ];

        // Remove properties with null values
        $data = array_filter($data, function ($value) {
            return $value !== null;
        });

        $this->merge($data);
    }
}
