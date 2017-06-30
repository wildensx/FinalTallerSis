<?php

namespace FinalSis\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PersonaFormRequest extends FormRequest
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
            'nombre'=>'required|max:100',
            'tipo_documento'=>'required|max:20',
            'num_documento'=>'required|max:15',
            'direccion'=>'max:50',
            'telefono'=>'max:10',
            'email'=>'max:30',
        ];
    }
}
