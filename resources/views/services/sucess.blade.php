@extends('adminlte::page')
@section('content')
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Comprovante da operação</title>
</head>

<body>

    <h1>Dados do {{$type}}</h1>
    <form action="" method="POST">
    @csrf
        <p> <b>Nome:</b> {{ $name }} </p>
        <p> <b>Agência:</b> {{ $branch }} </p>
        <p> <b>Conta:</b> {{ $number }} </p> <br/>
        <p> <b>Valor do {{ $type }}:</b> {{ $val }} </p> <br/>

    </form>

</body>
</html>
@stop