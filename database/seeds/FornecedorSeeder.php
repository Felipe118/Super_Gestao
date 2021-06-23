<?php

use Illuminate\Database\Seeder;
use App\Fornecedor;

class FornecedorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
       $fornecedor = new Fornecedor();
       $fornecedor->nome = "Fornecedor 100";
       $fornecedor->site = "fornecedor100.com.br";
       $fornecedor->uf ="DF";
       $fornecedor->email = "contato@forneceodr100.com.br";
       $fornecedor->save();

       //O metodo crate(atenção para o atributo fileabe da classe Fornecedor)
       Fornecedor::create([
           "nome"=> "Fornecedor 200",
           "site" => "fornecedor200.com.br",
           "uf" => "SP",
           "email" => "contato@forneceodr100.com.br"
       ]);

       //Insert
      
    }
}
