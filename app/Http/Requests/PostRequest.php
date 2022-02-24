<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PostRequest extends FormRequest
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
       $id= request()->all()['id'] ?? '';
        
        $validation= [
           

            'title'=>['required','min:3'],
            'description' =>['required','min:10'],
            'image' =>['required','image','exists:posts,id']
        
            ];

            if ($id){
                unset($validation['image']);
        return $validation;
            }
            return $validation;


    }
}
