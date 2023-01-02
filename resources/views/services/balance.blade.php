@extends('adminlte::page')
@section('content')
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Comprovante de Saldo</title>
</head>

<body>

    <h1>Comprovante de {{$type}}</h1>
    <form action="" method="POST">
    @csrf
        <p> <b>Nome:</b> {{ $name }} </p>
        <p> <b>Agência:</b> {{ $branch }} </p>
        <p> <b>Conta:</b> {{ $number }} </p> <br/>
        <h3> <b>Valor do {{ $type }}:</b> </h3>
        <h2> <b>R$ {{ $val }}</b> </h2> <br/>


    </form>

</body>
</html>
@stop
