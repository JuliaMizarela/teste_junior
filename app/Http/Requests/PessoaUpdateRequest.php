<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use App\Rules\ValidCEP;
use App\Rules\ValidCPF;

class PessoaUpdateRequest extends FormRequest
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
     * @return array
     */
    public function rules()
    {
        return [
            // url: viacep.com.br/ws/[8digitCEP]/json/ 
            'cep' => ['digits:8', new ValidCEP],
            // Aptation from: https://www.geradorcpf.com/script-validar-cpf-php.htm 
            'cpf' => ['numeric', new ValidCPF]
        ];
    }
}
