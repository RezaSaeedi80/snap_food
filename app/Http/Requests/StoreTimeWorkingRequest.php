<?php

namespace App\Http\Requests;

use App\Rules\WorkingTimeRule;
use Illuminate\Foundation\Http\FormRequest;

class StoreTimeWorkingRequest extends FormRequest
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
            'resturant_id' => ['required', 'unique:time_workings'],
            'saturday_end' => ['nullable', new WorkingTimeRule($this->saturday_start)],
            'sunday_end' => ['nullable', new WorkingTimeRule($this->sunday_start)],
            'monday_end' => ['nullable', new WorkingTimeRule($this->monday_start)],
            'thusday_end' => ['nullable', new WorkingTimeRule($this->thusday_start)],
            'wednesday_end' => ['nullable', new WorkingTimeRule($this->wednesday_start)],
            'thursday_end' => ['nullable', new WorkingTimeRule($this->thursday_start)],
            'friday_end' => ['nullable', new WorkingTimeRule($this->friday_start)],
        ];
    }

    public function messages()
    {
        return [
            'resturant_id.unique' => 'Working hours have already been registered for this restaurant.'
        ];
    }
}
