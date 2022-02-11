Teste:
    - Ser capaz de fazer a aplicação funcionar.
    - Validar o CEP enviado na requisição de cadastro e update(CEP precisa ser válido e constar na base de dados do ViaCEP: https://viacep.com.br).
    - Validar o CPF enviado na requisição de cadastro e update.
    - Disponibilizar os serviços de "show", "delete", "update", baseado nos serviços existentes, "store" e "find" no controller "PessoaController".
    

USANDO (bash):

curl -X POST -F 'nome=Alberto' -F 'sobrenome=Aquino' -F 'cpf=98906698542' -F 'celular=56' -F 'logradouro=kjd' -F 'cep=01001000'  http://127.0.0.1:8000/api/v1/pessoa
>> {"nome":"Alberto","sobrenome":"Aquino","cpf":"98906698542","celular":"56","logradouro":"kjd","cep":"01001000","updated_at":"2022-02-11 22:58:45","created_at":"2022-02-11 22:58:45","id":1}

curl -X GET  http://127.0.0.1:8000/api/v1/pessoa/1
>> {"id":1,"nome":"Alberto","sobrenome":"Aquino","cpf":"98906698542","celular":"56","logradouro":"kjd","cep":"01001000","created_at":"2022-02-11 22:58:45","updated_at":"2022-02-11 22:58:45"}

curl -X POST -F 'sobrenome=de Aquino'  http://127.0.0.1:8000/api/v1/pessoa/1
>> {"id":1,"nome":"Alberto","sobrenome":"de Aquino","cpf":"98906698542","celular":"56","logradouro":"kjd","cep":"01001000","created_at":"2022-02-11 22:58:45","updated_at":"2022-02-11 23:11:42"}

curl -X DELETE  http://127.0.0.1:8000/api/v1/pessoa/1
>> true


curl -X POST -F 'nome=Teste' -F 'sobrenome=de CPF Invalido A' -F 'cpf=00000000002' -F 'celular=56' -F 'logradouro=kjd' -F 'cep=01001000'  http://127.0.0.1:8000/api/v1/pessoa
>> redirects

curl -X POST -F 'nome=Teste' -F 'sobrenome=de CPF Invalido B' -F 'cpf=989066985' -F 'celular=56' -F 'logradouro=kjd' -F 'cep=01001000'  http://127.0.0.1:8000/api/v1/pessoa
>> redirects

curl -X POST -F 'nome=Teste' -F 'sobrenome=de CEP Invalido A' -F 'cpf=98906698542' -F 'celular=56' -F 'logradouro=kjd' -F 'cep=00000000'  http://127.0.0.1:8000/api/v1/pessoa
>> redirects

curl -X POST -F 'nome=Teste' -F 'sobrenome=de CEP Invalido B' -F 'cpf=98906698542' -F 'celular=56' -F 'logradouro=kjd' -F 'cep=0100100'  http://127.0.0.1:8000/api/v1/pessoa
>> redirects