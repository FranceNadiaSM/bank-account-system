@extends('adminlte::page')
@section('content')
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Alterar informações da conta</title>
</head>

<body>
    <form action="{{ route('edit_account', ['id' => $account->id]) }}" method="POST">
        @csrf
        <h1>Titular da Conta</h1>

        <label for="">Nome</label> <br/>
        <input type="text" name="name" value="{{ $client->name }}"><br/>

        <label for="">Email</label> <br/>
        <input type="text" name="email" value="{{ $client->email }}"><br/>

        <label for="">CPF</label> <br/>
        <input type="text" name="cpf" value="{{ $client->cpf }}"><br/>

        <label for="">Data de Nascimento</label> <br/>
        <input type="date" name="birth" value="{{ $client->birth }}"><br/>

        <label for="">Sexo</label> <br/>
        <input type="text" name="sex" value="{{ $client->sex }}"><br/>

        <label for="">Celular</label> <br/>
        <input type="text" name="cell_phone" value="{{ $client->cell_phone }}"><br/>

        <label for="">Profissão</label> <br/>
        <input type="text" name="occupation" value="{{ $client->occupation }}"><br/>

        <label for="">Estado Civil</label> <br/>
        <input type="text" name="marital_state" value="{{ $client->marital_state }}"><br/>

        <label for="">Rua</label> <br/>
        <input type="text" name="addr_street" value="{{ $client->addr_street }}"><br/>

        <label for="">Número</label> <br/>
        <input type="text" name="addr_number" value="{{ $client->addr_number }}"><br/>

        <label for="">Bairro</label> <br/>
            <input type="text" name="addr_neighborhood" value="{{ $client->addr_neighborhood }}"><br/>

        <label for="">Cidade</label> <br/>
        <input type="text" name="addr_city" value="{{ $client->addr_city }}"><br/>

        <label for="">CEP</label> <br/>
        <input type="text" name="addr_cep" value="{{ $client->addr_cep }}"><br/>

        <label for="">UF</label> <br/>
        <input type="text" name="addr_uf_id" value="{{ $client->addr_uf_id }}"><br/>

        <label for="">Complemento</label> <br/>
        <input type="text" name="addr_complement" value="{{ $client->addr_complement }}"><br/>

        <h1>Informações da Conta</h1>

        <label for="">Agência</label> <br/>
        <input type="text" name="bank_branch_id" value="{{ $account->bank_branch_id }}"><br/>

        <label for="">Número da Conta</label> <br/>
        <input type="text" name="number" value="{{ $account->number }}"><br/> 

        <button>Salvar</button>        
    </form>

    @if($errors->any())
        @foreach($errors->all() as $error)
            <div class="alert alert-danger">
                <p> {{$error}} </p>
            </div>
        @endforeach
    @endif

</body>
</html>
@stop