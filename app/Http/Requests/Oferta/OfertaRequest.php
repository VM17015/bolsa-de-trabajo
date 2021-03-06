<?php

namespace App\Http\Requests\Oferta;

use Illuminate\Foundation\Http\FormRequest;

class OfertaRequest extends FormRequest
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
            'nombre_oferta' => 'required|string|regex:/^[A-zÀ-ú0-9.\s]+$/|max:50',
            'descripcion_oferta' => 'required|string|max:255',
            'otros_requisitos' => 'required|string|max:500',
            'ubicacion' => 'required|string|max:100',
            'fecha_inicio' => 'bail|required|date|date_format:d/m/Y|after_or_equal:today',
            'fecha_fin' => 'nullable|date|date_format:d/m/Y|after:fecha_inicio',
            'vacantes' => 'required|integer',
            'experiencia' => 'required|integer',
            'genero' => 'required|string|size:1',
            'viajar' => 'nullable|boolean',
            'vehiculo' => 'nullable|boolean',
            'cambio_residencia' => 'nullable|boolean',
            'id_empresa' => 'required|exists:empresa,id',
            'id_puesto' => 'required|exists:puesto,id',
            'id_ciudad' => 'required|exists:ciudad,id',
            //Array de IDs de las hobilidades y su experiencia (en años)
            'habilidades' => 'nullable|array',
            'habilidades.*' => 'distinct|exists:habilidad,id',
            'hab_exp' => 'required_with:habilidades|array',
            'hab_exp.*' => 'nullable|integer',
            //Array de IDs de las los titulos academicos y su progreso (en años)
            'titulos' => 'nullable|array',
            'titulos.*' => 'distinct|exists:titulo_academico,id',
            'titulos_exp' => 'required_with:titulos|array',
            'titulos_exp.*' => 'nullable|integer',
        ];
    }
}
