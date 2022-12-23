<!DOCTYPE html>
<html>
<head>
    <title>Relatório PDF</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>

<body>
    <h1>Transações realizadas neste período</h1>

    </br></br>
    <h4><b> {{ $data1 }} - {{ $data2 }} </b></h4>
    </br>
  
    <table class="table table-bordered">
        <tr>
            <th>Data</th>
            <th>Tipo</th>
            <th>Valor</th>
            <th>Beneficiário</th>
        </tr>

        @foreach($transations as $transation)
        <tr>
            <td>{{ $transation->date_of_transaction }}</td>
            <td>{{ $transation->transaction_type }}</td>
            <td>{{ $transation->transaction_amount }}</td>
            <td>{{ $clients->name }}</td>
        </tr>
        @endforeach
    </table>

    <table class="table table-bordered">
        <tr>
            <th><h2> Saldo atual: {{ $balance->current_balance}}</h2></th>
        </tr>
        
    </table>
  
</body>
</html>