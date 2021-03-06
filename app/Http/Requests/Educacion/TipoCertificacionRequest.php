<?php

namespace App\Http\Requests\Educacion;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class TipoCertificacionRequest extends FormRequest
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
            'nombre_tipo_cert' => [
                'required',
                'string',
                'regex:/^[A-zÀ-ú0-9.\s]+$/',
                'max:50',
                Rule::unique('tipo_certificacion')->ignore(
                    ($this->tipo && strcasecmp($this->tipo->nombre_tipo_cert, $this->nombre_tipo_cert) == 0) ?
                        $this->tipo->id : null
                )
            ],
        ];
    }
}
