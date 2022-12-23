<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Rules\Cpf;
use App\Rules\Sex;
use App\Rules\FullName;
use App\Rules\MaritalState;
use App\Rules\UFsValidate;
use App\Models\Account;
use App\Models\Client;
use App\Models\BalanceRecord;
use Carbon\Carbon;


class AccountController extends Controller
{
    public function index()
    {
        $accounts = Account::orderBy('created_at', 'desc')->get();
        foreach ($accounts as $ac) {
            $clients = Client::where('id', $ac->client_id)->get();
        }
        return view('account.index', compact('accounts', 'clients'));
    }

    public function create()
    {
        return view('account.create');
    }


    public function store(Request $request)
    {

        //VALIDAÇÕES
        $request->validate([
        'bank_branch_id' => ['required', 'integer'],
        'name' => ['min:7', 'max:90', new FullName],
        'email' => ['email', 'min:10','max:120'],

        'cpf' => ['required', 'max:11', new Cpf],
        
        'birth' => ['date', 'min:7','max:10'],
        'sex' => ['required', new Sex],
        'phone' => ['min:10','max:15'],
        'cell_phone' => ['min:10','max:15'],
        'occupation' => ['min:7', 'max:120'],
        'marital_state' => ['required', new MaritalState],
        'addr_street' => ['min:1','max:120'],
        'addr_number' => ['min:1','max:10'],
        'addr_neighborhood' => ['min:5','max:150'],
        'addr_city' => ['min:2','max:45',],
        'addr_cep' => ['min:8','max:15'],
        'addr_uf_id' => ['required', new UFsValidate],
        'addr_complement' => ['min:2','max:45'],
        ]);

        $clients = new Client();
        $clients->id = $request->id;                
        $clients->name = $request->name;
        $clients->email = $request->email;
        $clients->cpf = $request->cpf;                
        $clients->birth = $request->birth;
        $clients->sex = $request->sex;
        $clients->cell_phone = $request->cell_phone;
        $clients->occupation = $request->occupation;                
        $clients->marital_state = $request->marital_state;
        $clients->addr_street = $request->addr_street;
        $clients->addr_number = $request->addr_number;
        $clients->addr_neighborhood = $request->addr_neighborhood;
        $clients->addr_city = $request->addr_city;
        $clients->addr_cep = $request->addr_cep;
        $clients->addr_uf_id = $request->addr_uf_id;
        $clients->addr_complement = $request->addr_complement;
        $clients->save(); 

        if ($clients){
            $accounts = new Account();
            $accounts->id = $request->id;
            $accounts->client_id = $clients->id;//pegar id do cliente que acabou de ser criado
            $accounts->bank_branch_id = $request->bank_branch_id;
            $accounts->opening_balance = 00;
            $accounts->opening_date = Carbon::now();
            $accounts->status = 1;//ativo=1;inativo=0;

                $result = Account::select('number')->orderBy('created_at', 'desc')->first();//select no último dado inserido

                $year_now = date('y');//pega o ano atual: 22
                if (!$result) {
                    $accounts->number = $year_now."0001";//cria 1º número de conta
                }
                else {
                    $last_year = substr($result->number, 0,2);//ano do ultimo dado
                    if($last_year != $year_now) {
                        $accounts->number = $year_now."0001";//cria uma nova sequência de número de conta
                    } else {
                        $accounts->number = intval($result->number)+1;
                    }
                }
            $accounts->save();

            $balance = new BalanceRecord();
            $balance->account_id = $accounts->id;
            $balance->current_balance = 00;
            $balance->date = Carbon::now();
            $balance->save();
        }

        return view('account.create');
    }

    public function show($id)
    {
        $account = Account::findOrFail($id );
        $client = Client::findOrFail($account->client_id);

        return view('account.show', compact('account', 'client'));
    }

    public function show_edit()
    {
        $accounts = Account::orderBy('created_at', 'desc')->get();
        foreach ($accounts as $ac) {
            $clients = Client::where('id', $ac->client_id)->get();
        }
        return view('account.show_edit', compact('accounts', 'clients'));
    }

    public function edit($id)
    {
        $account = Account::findOrFail($id );
        $client = Client::findOrFail($account->client_id);
        return view('account.edit', compact('account', 'client'));
    }

    public function update(Request $request, $id)
    {

        $account = Account::findOrFail($id);
        $client = Client::where('id', $account->client_id)->first();

        //VALIDAÇÕES
        $request->validate([
            'bank_branch_id' => ['required', 'integer'],
            'name' => ['min:7', 'max:90', new FullName],
            'email' => ['email', 'min:10','max:120'],
    
            'cpf' => ['required', 'max:11', new Cpf],
            
            'birth' => ['date', 'min:7','max:10'],
            'sex' => ['required', new Sex],
            'phone' => ['min:10','max:15'],
            'cell_phone' => ['min:10','max:15'],
            'occupation' => ['min:7', 'max:120'],
            'marital_state' => ['required', new MaritalState],
            'addr_street' => ['min:1','max:120'],
            'addr_number' => ['min:1','max:10'],
            'addr_neighborhood' => ['min:5','max:150'],
            'addr_city' => ['min:2','max:45',],
            'addr_cep' => ['min:8','max:15'],
            'addr_uf_id' => ['required', new UFsValidate],
            'addr_complement' => ['min:2','max:45'],
        ]);
        
            $client->name = $request->name;
            $client->email = $request->email;
            $client->cpf = $request->cpf;                
            $client->birth = $request->birth;
            $client->sex = $request->sex;
            $client->cell_phone = $request->cell_phone;
            $client->occupation = $request->occupation;                
            $client->marital_state = $request->marital_state;
            $client->addr_street = $request->addr_street;
            $client->addr_number = $request->addr_number;
            $client->addr_neighborhood = $request->addr_neighborhood;
            $client->addr_city = $request->addr_city;
            $client->addr_cep = $request->addr_cep;
            $client->addr_uf_id = $request->addr_uf_id;
            $client->addr_complement = $request->addr_complement;
            $client->save(); 

            $account->bank_branch_id = $request->bank_branch_id;
            $account->number = $request->number;
            $account->save();
            
            return view('account.create');
    }

    public function show_delete()
    {
        $accounts = Account::orderBy('created_at', 'desc')->get();
        foreach ($accounts as $ac) {
            $clients = Client::where('id', $ac->client_id)->get();
        }
        return view('account.show_delete', compact('accounts', 'clients'));
    }

    public function delete($id)
    {
        $account = Account::findOrFail($id );
        $client = Client::findOrFail($account->client_id);
        return view('account.delete', compact('account', 'client'));
    }
    public function destroy($id)
    {
        $account = Account::findOrFail($id);
        $client = Client::where('id', $account->client_id)->first();
        
        $account->delete();
        $client->delete();
        
        return view('account.create');
    }
}