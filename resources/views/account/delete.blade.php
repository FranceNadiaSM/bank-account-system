@extends('adminlte::page')
@section('content')
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Excluir Conta</title>
</head>

<body>
    <form action="{{ route('delete_account', ['id' => $account->id]) }}" method="POST">
        @csrf
            <label for="">Tem certeza que deseja deletar essa conta?</label> <br/>
            <input type="text" name="name" value="{{ $client->name }}"><br/> 

            <button>Sim</button>
</body>
</html>
@stop