@extends('adminlte::page')
@section('content')
<h1>Contas Cadastradas</h1>

<hr>
<br><table border="2">
    <tr>
        <th>NÚMERO DA CONTA</th>
        <th>TITULAR</th>
        <th>DATA DE ABERTURA</th>
        <th>STATUS</th>
        <th>VISUALIZAR</th>
        <th>ALTERAR</th>
    </tr>


    @foreach($accounts as $account)
    <tr>
        <th> {{ $account->number }} </th>
        <th> {{ $account->client_id}} </th>
        <th> {{ $account->opening_date}} </th>
        <th> {{ $account->status}} </th>
        <th><a href="/account/view/{{$account->id}}">VISUALIZAR</a></th>
        <th><a href="/account/edit/{{$account->id}}">ALTERAR</a></th>
    </tr>
    @endforeach

</table>
@stop