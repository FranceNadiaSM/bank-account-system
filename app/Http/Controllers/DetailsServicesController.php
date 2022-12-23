<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Account;
use App\Models\Client;
use App\Models\TransactionDetail;
use PDF;

class DetailsServicesController extends Controller
{
    public function show_rel_services()
    {
        return view('services.show_rel_services');
    }

    public function period(Request $request)
    {
        $request->validate([
            'bank_branch_id' => ['required', 'integer', 'exists:bank_branches,id'],
            'number' => ['required', 'integer', 'exists:accounts,number'],
        ]);
        
        $account = Account::where('number', $request->number)->first();
        $account = Account::findOrFail($account->id);
        return view('services.period', compact('account'));
    }

    public function download(Request $request, $id)
    {
        $account = Account::where('id', $id,)->first();
        if (!$account) return response()->json(['data' => ['msg' => 'Conta inexistente!']], 400);

        $transations = TransactionDetail::where('account_id', $account->id)
                                        ->whereBetween('date_of_transaction', [$request->date1, $request->date2])
                                        ->get();
        $clients = Client::where('id', $account->client_id)->first();

        //período
        $data1 = date('d-m-Y', strtotime($request->date1));
        $data2 = date('d-m-Y', strtotime($request->date2));
        
        return PDF::loadView('services.rel_services', ['transations' => $transations, 'clients' =>$clients,
                                                    'data1' => $data1,'data2' => $data2])
                                                ->stream();

    }
}
