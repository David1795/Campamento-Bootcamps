<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Http\Exceptions\HttpResponseException;

class StoreReviewRequest extends FormRequest
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
            "title" => 'required|max:20',
            "text" => 'required|max:50',
            'rating' => 'required|numeric|min:1|max:10',
            "bootcamp_id" => 'required|exists:bootcamps,id',
            "user_id" => 'required|exists:users,id'
        ];
    }

    public function messages()
    {
        return [
            'title.required' => 'Titulo obligatorio',
            'title.max' => 'Titulo maximo de 20',

            'text.required' => 'Texto obligatorio',
            'text.max' => 'Titulo maximo de 50',

            'rating.required' => 'Titulo obligatorio',
            'rating.numeric' => 'Solo introduzca numeros',
            'rating.min' => 'Rating maximo de 1',
            'rating.max' => 'Rating maximo de 10',

            'bootcamp_id.required' => 'Titulo obligatorio',
            'bootcamp_id.exists' => 'Bootcamp no existe',

            'user_id.required' => 'Titulo obligatorio',
            'user_id.exists' => 'Usuario no existe'
        ];
    }


    protected function failedValidation(Validator $v){

    throw new HttpResponseException(
        response()->json(["success"=>false,"errors"=> $v->errors()],422)
    );

}
}
