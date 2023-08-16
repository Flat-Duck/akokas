<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Contracts\Validation\Validator;

class PostStoreRequest extends FormRequest
{
    public function rules()
    {
        return [

            'body' => ['required','max:255', 'string'],
            'screen' => ['required','file'],
       //     'user_id' => ['numeric'],
        ];
    }

    public function failedValidation(Validator $validator)
    {
        throw new HttpResponseException(response()->json([
            'success'   => false,
            'message'   => 'Validation errors',
            'data'      => $validator->errors()
        ]));
    }

    public function messages()
    {
        return [
            'screen.required' => 'ScreenShot is required',
            'body.required' => 'Body is required'
        ];
    }
}

// use Illuminate\Foundation\Http\FormRequest;
// use Illuminate\Http\Exceptions\HttpResponseException;

// class PostStoreRequest extends FormRequest
// {
//     /**
//      * Determine if the user is authorized to make this request.
//      *
//      * @return bool
//      */
//     public function authorize()
//     {
//         return true;
//     }

//     /**
//      * Get the validation rules that apply to the request.
//      *
//      * @return array
//      */
//     public function rules()
//     {
//         return [
//             'body' => ['required','max:255', 'string'],
//             'screen' => ['required','file'],
//             'user_id' => ['numeric'],
//         ];
//     }
//     public function failedValidation(Validator $validator)

//     {

//         throw new HttpResponseException(response()->json([

//             'success'   => false,

//             'message'   => 'Validation errors',

//             'data'      => $validator->errors()

//         ]));

//     }
// }
