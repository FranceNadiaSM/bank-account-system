@extends('adminlte::page')
@section('content')
<form action="{{ route('period', ['id' => $account->id]) }}" method="POST">
    <h1> Selecione o período desejado para gerar o relatório </h1>
    @csrf
    <div class="row">
        <div class="col-xs-6 col-sm-6 col-md-6">
            <div class="form-group">
                <strong>Data inicial:</strong>
                <input type="date" name="date1" class="form-control" placeholder="Start Date">
            </div>
        </div>
    </div></br>
    <div class="row">
        <div class="col-xs-6 col-sm-6 col-md-6">
            <div class="form-group">
                <strong>Data final:</strong>
                <input type="date" name="date2" class="form-control" placeholder="End Date">
            </div>
        </div>
    </div></br>

    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12 text-center">
            <button type="submit" class="btn btn-primary">Confirmar</button>
        </div>
    </div>
</form>
@stop