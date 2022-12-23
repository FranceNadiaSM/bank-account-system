@extends('adminlte::page')
@section('content')

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Abrir uma nova conta</title>
</head>

<body>

    <form action="{{ route('insert_account') }}" method="POST">
    @csrf
        <label for="">Agência</label> <br/>
        <input type="text" name="bank_branch_id" value="{{ old('bank_branch_id') }}"><br/>

        <label for="">Nome</label> <br/>
        <input type="text" name="name" value="{{ old('name') }}"><br/>

        <label for="">Email</label> <br/>
        <input type="text" name="email" value="{{ old('email') }}"><br/>

        <label for="">CPF</label> <br/>
        <input type="text" name="cpf" value="{{ old('cpf') }}"><br/>

        <label for="">Data de Nascimento</label> <br/>
        <input type="text" name="birth" value="{{ old('birth') }}"><br/>

        <label for="">Sexo</label> <br/>
            <select name="sex" value="{{ old('sex') }}">
                <option value=""></option>
                <option value="0">Feminino</option>
                <option value="1">Masculino</option>
            </select> <br/>

        <label for="">Celular</label> <br/>
        <input type="text" name="cell_phone" value="{{ old('cell_phone') }}"><br/>

        <label for="">Profissão</label> <br/>
        <input type="text" name="occupation" value="{{ old('occupation') }}"><br/>

        <label for="">Estado Civil</label> <br/>
            <select name="marital_state" value="{{ old('marital_state') }}">
                    <option value=""></option>
                    <option value="1">Solteiro(a)</option>
                    <option value="2">Casado(a) ou residindo com o(a) parceiro(a)</option>
                    <option value="3">Viúvo(a)</option>
                    <option value="4">Divorciado(a)</option>
            </select> <br/>

        <label for="">Rua</label> <br/>
        <input type="text" name="addr_street" value="{{ old('addr_street') }}"><br/>

        <label for="">Número</label> <br/>
        <input type="text" name="addr_number" value="{{ old('addr_number') }}"><br/>

        <label for="">Bairro</label> <br/>
        <input type="text" name="addr_neighborhood" value="{{ old('addr_neighborhood') }}"><br/>

        <label for="">Cidade</label> <br/>
        <input type="text" name="addr_city" value="{{ old('addr_city') }}"><br/>

        <label for="">CEP</label> <br/>
        <input type="text" name="addr_cep" value="{{ old('addr_cep') }}"><br/>

        <label for="">UF</label> <br/>
            <select name="addr_uf_id">
                <option value=""></option>
                <option value="0">AC</option>
                <option value="1" >AL</option>
                <option value="2">AP</option>
                <option value="3">AM</option>
                <option value="4">BA</option>
                <option value="5">CE</option>
                <option value="6">DF</option>
                <option value="7">ES</option>
                <option value="8">GO</option>
                <option value="9">MA</option>
                <option value="10">MG</option>
                <option value="11">MS</option>
                <option value="12">MT</option>
                <option value="13">PA</option>
                <option value="14">PB</option>
                <option value="15">PR</option>
                <option value="16">PE</option>
                <option value="17">PI</option>
                <option value="18">RJ</option>
                <option value="19">RN</option>
                <option value="20">RS</option>
                <option value="21">RO</option>
                <option value="22">RR</option>
                <option value="23">SC</option>
                <option value="24">SP</option>
                <option value="25">SE</option>
                <option value="26">TO</option>
            </select> <br/>

        <label for="">Complemento</label> <br/>
        <input type="text" name="addr_complement" value="{{ old('addr_complement') }}"><br/>

        </br>
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
