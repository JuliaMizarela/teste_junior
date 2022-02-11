<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;

class ValidCEP implements Rule
{
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
    public function passes($attribute, $cep)
    {
        $xml = simplexml_load_string( @file_get_contents("http://viacep.com.br/ws/".$cep."/xml/"));
        $erro = (string) $xml->erro;
        return !$erro;
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return 'CEP não encontrado.';
    }
}
