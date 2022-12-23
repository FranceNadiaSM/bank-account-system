<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;

class Sex implements Rule
{
    const SEXO = [
        '0' => 'FEMININO',
        '1' => 'MASCULINO',
    ];
    /**
     * Create a new rule instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
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
        return isset(static::SEXO[$value]);
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
