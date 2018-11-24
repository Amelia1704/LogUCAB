<?php

namespace logUcab\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ClienteFormRequest extends FormRequest
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
            'cedula' => 'required|numeric',
            'nombre' => 'required|max:30',
            'apellido' => 'required|max:30',
            'fecha_nac' => 'required|max:30',
            'estado_civil' => 'required|max:30',
            'empresa' => 'required|max:30',
            'l_vip' => 'max:30',
            'fk_lugar' => 'required',
        ];
    }
}
