<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CoverageFormRequest extends FormRequest
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
            'animal_id' => 'required',
            'last_birth' => 'required',
            'type' => 'required',
            'insemination_date' => 'required',
            'diagnosis' => 'required',
        ];
    }
    public function messages(){
      return [
          'animal_id.required'=> 'Esse campo é obrigatório',
          'last_birth.required'=> 'Esse campo é obrigatório',
          'type.required'=> 'Esse campo é obrigatório',
          'insemination_date.required'=> 'Esse campo é obrigatório',
          'diagnosis.required'=> 'Esse campo é obrigatório',
      ];
    }
}
