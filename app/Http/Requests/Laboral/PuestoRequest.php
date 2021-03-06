<?php

namespace App\Http\Requests\Laboral;

use Illuminate\Foundation\Http\FormRequest;

class PuestoRequest extends FormRequest
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
            'nombre_puesto' => 'required|string|regex:/^[A-zÀ-ú0-9.\s]+$/|max:50',
            'id_cat_puesto' => 'required|exists:categoria_puesto,id',
        ];
    }
}
