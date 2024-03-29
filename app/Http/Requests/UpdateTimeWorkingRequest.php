<?php

namespace App\Http\Requests;

use App\Rules\WorkingTimeRule;
use Illuminate\Foundation\Http\FormRequest;

class UpdateTimeWorkingRequest extends FormRequest
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
            'saturday_end' => ['nullable', new WorkingTimeRule($this->saturday_start)],
            'sunday_end' => ['nullable', new WorkingTimeRule($this->sunday_start)],
            'monday_end' => ['nullable', new WorkingTimeRule($this->monday_start)],
            'tuesday_end' => ['nullable', new WorkingTimeRule($this->tuesday_start)],
            'wednesday_end' => ['nullable', new WorkingTimeRule($this->wednesday_start)],
            'thursday_end' => ['nullable', new WorkingTimeRule($this->thursday_start)],
            'friday_end' => ['nullable', new WorkingTimeRule($this->friday_start)],
        ];
    }
}
