<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;

class MaritalState implements Rule
{
    const STATE = [
        '0' => 'Solteiro',
        '1' => 'Casado(a) ou residindo com o(a) parceiro(a)',
        '2' => 'Viúvo(a)',
        '3' => 'Divorciado(a)',
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
        return isset(static::STATE[$value]);
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
