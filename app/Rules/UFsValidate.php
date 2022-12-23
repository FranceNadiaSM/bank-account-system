<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;

class UFsValidate implements Rule
{

    const ESTADOS = [
        '0' => [ 'AC', 'Acre'],
        '1' => ['AL', 'Alagoas'],
        '2' => ['AP', 'Amapá'],
        '3' => ['AM', 'Amazonas'],
        '4' => ['BA', 'Bahia'],
        '5' => ['CE', 'Ceará'],
        '6' => ['DF', 'Distrito Federal'],
        '7' => ['ES', 'Espirito Santo'],
        '8' => ['GO', 'Goiás'],
        '9' => ['MA', 'Maranhão'],
        '10' => ['MS', 'Mato Grosso do Sul'],
        '11' => ['MT', 'Mato Grosso'],
        '12' => ['MG', 'Minas Gerais'],
        '13' => ['PA', 'Pará'],
        '14' => ['PB', 'Paraíba'],
        '15' => ['PR', 'Paraná'],
        '16' => ['PE', 'Pernambuco'],
        '17' => ['PI', 'Piauí'],
        '18' => ['RJ', 'Rio de Janeiro'],
        '19' => ['RN', 'Rio Grande do Norte'],
        '20' => ['RS', 'Rio Grande do Sul'],
        '21' => ['RO', 'Rondônia'],
        '22' => ['RR', 'Roraima'],
        '23' => ['SC', 'Santa Catarina'],
        '24' => ['SP', 'São Paulo'],
        '25' => ['SE', 'Sergipe'],
        '26' => ['TO', 'Tocantins'],
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
        return isset(static::ESTADOS[$value]);
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return 'Por favor insira um Estado válido.';
    }
}
