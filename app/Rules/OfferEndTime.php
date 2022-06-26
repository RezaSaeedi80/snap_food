<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;

class OfferEndTime implements Rule
{
    private $start_time;

    /**
     * Create a new rule instance.
     *
     * @return void
     */
    public function __construct($start_time)
    {
        $this->start_time = $start_time;
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
        //
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return 'The validation error message.';
    }
}
