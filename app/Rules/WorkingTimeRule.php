<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;

class WorkingTimeRule implements Rule
{

    private $start;

    /**
     * Create a new rule instance.
     *
     * @return void
     */
    public function __construct($start)
    {
        $this->start = $start;
    }

    /**
     * Determine if the validation rule passes.
     *
     * @param  string  $attribute
     * @param  mixed  $value
     * @return bool
     */
    public function passes($attribute, $value)
    {
        return strtotime($value) > strtotime($this->start);
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return 'The start time must be greater than the end time.';
    }
}
