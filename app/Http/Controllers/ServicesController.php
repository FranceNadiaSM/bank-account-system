<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Account;
use App\Models\Client;
use App\Models\BankBranch;
use App\Models\TransactionDetail;
use App\Models\BalanceRecord;
use Carbon\Carbon;


class ServicesController extends Controller
{

    public function show_balance()
    {
        return view('services.show_balance');
    }

    public function display_balance(Request $request)
    {//exibir saldo
        $request->validate([
            'bank_branch_id' => ['required', 'integer', 'exists:bank_branches,id'],
            'number' => ['required', 'integer', 'exists:accounts,number'],
        ]);

        $account = Account::where('number', $request->number)->first();

        $account = Account::where('id', $account->id)->first();
        if (!$account) return response()->msg(['data' => ['msg' => 'Conta inexistente!']], 400);

        // $transaction_details = TransactionDetail::where('account_id', $account->id)->first();
        // if (!$transaction_details) return response()->json(['data' => ['msg' => 'Não foi feita nenhuma transação nesta conta, portanto não há saldo!']], 400);

        $balance = BalanceRecord::where('account_id', $account->id)->first();
        if (!$balance) return response()->json(['data' => ['msg' => 'Cadastro inexistente!']], 400);

            // echo json_encode($balance->current_balance);//saldo da conta

        $client = Client::where('id', $account->client_id)->first();
        $branch = BankBranch::where('id', $account->bank_branch_id)->first();

        return view('services.balance', ['type' => "Saldo", 'name' => $client->name,'branch' => $branch->id, 
                                        'number' => $account->number, 'val' => $balance->current_balance]);
    }

    public function show_deposit()
    {
        return view('services.show_deposit');
    }

    public function deposit(Request $request)
    {// depositar
        $request->validate([
            'bank_branch_id' => ['required', 'integer', 'exists:bank_branches,id'],
            'number' => ['required', 'integer', 'exists:accounts,number'],
        ]);

        $account = Account::where('number', $request->number)->first();
        $client = Client::where('id', $account->client_id)->first();
        $branch = BankBranch::where('id', $account->bank_branch_id)->first();

        $transaction = new TransactionDetail();
        $transaction->id = $request->id;
        $transaction->account_id = $account->id;
        $transaction->date_of_transaction = Carbon::now();
        $transaction->transaction_type = "Depósito";
        $transaction->transaction_amount = $request->transaction_amount;
        $transaction->save();

        //saldo
        $balance = BalanceRecord::where('account_id', $transaction->account_id)->first();
            if ($balance) $balance->current_balance = intval($balance->current_balance) + intval($transaction->transaction_amount);
        $balance->date = Carbon::now();
        $balance->save();

        return view('services.sucess', ['type' => $transaction->transaction_type, 
                                        'name' => $client->name,'branch' => $branch->id, 
                                        'number' => $request->number, 'val' => $request->transaction_amount]);
    }

    public function show_retrait()
    {
        return view('services.show_retrait');
    }

    public function retrait(Request $request)
    {// sacar dinheiro
        $request->validate([
            'bank_branch_id' => ['required', 'integer', 'exists:bank_branches,id'],
            'number' => ['required', 'integer', 'exists:accounts,number'],
        ]);

        $account = Account::where('number', $request->number)->first();
        $client = Client::where('id', $account->client_id)->first();
        $branch = BankBranch::where('id', $account->bank_branch_id)->first();

        $transaction = new TransactionDetail();
        $transaction->id = $request->id;
        $transaction->account_id = $account->id;
        $transaction->date_of_transaction = Carbon::now();
        $transaction->transaction_type = "Saque";
        $transaction->transaction_amount = $request->transaction_amount;
        $transaction->save();

        //saldo
        $balance = BalanceRecord::where('account_id', $transaction->account_id)->first();
            if ($balance) $balance->current_balance = intval($balance->current_balance) - intval($transaction->transaction_amount);
        $balance->date = Carbon::now();
        $balance->save();

        return view('services.sucess', ['type' => $transaction->transaction_type, 
                                        'name' => $client->name,'branch' => $branch->id, 
                                        'number' => $request->number, 'val' => $request->transaction_amount]);
    }
      
    
}
