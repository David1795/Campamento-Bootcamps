<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Http\Exceptions\HttpResponseException;


class StoreBootcampRequest extends FormRequest
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
            "name" => 'required|min:5',
            "user_id" => 'required|exists:users,id'
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'Nombre obligatorio',
            'name.min' => 'Nombre minimo de 5',
            'user_id.exists' => 'Usuario no existe'
        ];
    }


protected function failedValidation(Validator $v){

    throw new HttpResponseException(
        response()->json(["success"=>false,"errors"=> $v->errors()],422)
    );
}



}
