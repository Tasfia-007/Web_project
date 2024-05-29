<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
//controller e amra add update dlt krsi ekhane amra option e click korle req accept krbe eta dekhbo 

class MenuStoreRequest extends FormRequest
{
    
    public function authorize()
    {
        return true;
    }

    
    public function rules()
    {
        return [
            'name' => ['required'],
            'description' => ['required'],
            'price' => ['required'],
            'image' => ['required', 'image'],
        ];
    }
}
