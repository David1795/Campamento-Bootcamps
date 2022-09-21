<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Http\Exceptions\HttpResponseException;

class StoreCourseRequest extends FormRequest
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
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [

            "title" => 'required|max:30|min:10',
            "description" => 'required|min:10',
            'weeks' => 'required|max:9|min:1',
            'enroll_cost' => 'required|numeric',
            'minimum_skill' => 'in:Beginner,Intermediate,Advanced,Expert',
            
            "bootcamp_id" => 'required|exists:bootcamps,id'
            
            
           
        ];
    }

    public function messages()
    {
        return [
            'title.required' => 'Titulo obligatorio',
            'title.min' => 'Titulo maximo de 10 caractres',
            'title.max' => 'Titulo maximo de 30 caractres',

            'description.required' => 'Texto obligatorio',
            'description.min' => 'Descripcion maxima de 10 caracteres',

            'weeks.required' => 'Semana obligatorio',
            'weeks.max' => 'El número máximo es 9',
            'weeks.min' => 'El número minimo es 1',


            'enroll_cost.requerido' => 'Campo Obligatorio',
            'enroll_cost.numeric' => 'Solo se acepta numeros',

            'minimum_skill.in' =>'Beginner,Intermediate,Advanced,Expert',

            'bootcamp_id.exists' => 'Bootcamp no existe'

        ];
    }


    protected function failedValidation(Validator $v){

    throw new HttpResponseException(
        response()->json(["success"=>false,"errors"=> $v->errors()],422)
    );

}
}
