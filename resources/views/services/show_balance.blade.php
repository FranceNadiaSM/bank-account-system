@extends('adminlte::page')
@section('content')
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Realizar um nova transação</title>
</head>

<body>
    </br>
    <h4>Informe os dados:</h4>

    <form action="{{ route('balance') }}" method="POST">
    @csrf
        <label for="">Agência</label> <br/>
        <input type="text" name="bank_branch_id" value="{{ old('bank_branch_id') }}"><br/>

        <label for="">Número Conta</label> <br/>
        <input type="text" name="number" value="{{ old('number') }}"><br/>

        </br>
        <button>Confirmar</button>        
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