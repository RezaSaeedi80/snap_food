<?php

namespace App\Http\Requests;

use App\Rules\IranianPhoneRule;
use Illuminate\Foundation\Http\FormRequest;

class UpdateResturantRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return auth()->id() === $this->route('resturant')->user_id;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'name' => 'required|min:4|max:30',
            'phone' => ['required', new IranianPhoneRule],
            'category' => 'required',
            'account_number' => 'required',
            'lng' => 'required',
            'lat' => 'required',
            'address_title' => 'required|min:5|max:20',
            'address' => 'required|min:5|max:30'
        ];
    }

    public function messages()
    {
        return [
            'lng.required' => 'The location is required.'
        ];
    }
}
