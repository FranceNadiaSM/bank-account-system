<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\BankBranch;

class BankBranchesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        BankBranch::create([
            'name' => 'Banco Teste1',
            'city' => 'Cidade Teste',
            'cod' => '1234',
        ]);
        BankBranch::create([
            'name' => 'Banco Teste2',
            'city' => 'Cidade Teste',
            'cod' => '1243',
        ]);
        BankBranch::create([
            'name' => 'Banco Teste3',
            'city' => 'Cidade Teste',
            'cod' => '1324',
        ]);
        BankBranch::create([
            'name' => 'Banco Teste4',
            'city' => 'Cidade Teste',
            'cod' => '1423',
        ]);
    }
}
