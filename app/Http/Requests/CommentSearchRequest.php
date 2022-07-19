<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CommentSearchRequest extends FormRequest
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
            'food_id' => 'required_without:resturant_id|prohibited_unless:resturant_id,null',
            'resturant_id' => 'required_without:food_id|prohibited_unless:food_id,null'
        ];
    }
}
