<?php

namespace logUcab\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SucursalFormRequest extends FormRequest
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
            'nombre' => 'required|max:30',
            'capacidad' => 'required|numeric',
            'email' => 'required|max:30',
            'capacidad_almacenamiento' => 'required|numeric',
            'fk_lugar' => 'required',
            'fk_personacontacto' => 'required',
        ];
    }

}
