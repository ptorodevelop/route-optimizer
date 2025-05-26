<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class OptimizeRouteRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'points' => 'required|array|min:2',
            'points.*' => 'array|size:2',
            'points.*.0' => 'numeric|between:-180,180',
            'points.*.1' => 'numeric|between:-90,90',
        ];
    }

    public function messages(): array
    {
        return [
            'points.required' => 'Debe enviar el arreglo de puntos.',
            'points.array' => 'El campo points debe ser un arreglo.',
            'points.min' => 'Debe enviar al menos dos puntos.',
            'points.*.array' => 'Cada punto debe ser un arreglo [longitud, latitud].',
            'points.*.size' => 'Cada punto debe tener exactamente 2 valores.',
            'points.*.0.numeric' => 'La longitud debe ser numérica.',
            'points.*.0.between' => 'La longitud debe estar entre -180 y 180.',
            'points.*.1.numeric' => 'La latitud debe ser numérica.',
            'points.*.1.between' => 'La latitud debe estar entre -90 y 90.',
        ];
    }
}
