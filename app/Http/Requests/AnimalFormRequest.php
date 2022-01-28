<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AnimalFormRequest extends FormRequest
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
        'name'=>'required',
        'earring'=>'required',
        
        'animal_stage'=>'required',

      ];
    }
    public function messages()
    {
        return [

          'name.required'=>'O nome do animal é obrigatório',
          'earring.required'=>'O número do brinco é obrigatório',          
          'animal_stage.required'=>'A fase do animal é obrigatório',
        ];
    }
}
