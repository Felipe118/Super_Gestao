<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
Use App\Fornecedor;

class FornecedorController extends Controller
{
    public function index() {
        return view('app.fornecedor.index');
    }
    public function listar(Request $request) {
        $fornecedores = Fornecedor::with(['produtos'])->where('nome', 'like', '%'.$request->input('nome').'%')
        ->where('site', 'like', '%'.$request->input('site').'%')
        ->where('uf', 'like', '%'.$request->input('uf').'%')
        ->where('email', 'like', '%'.$request->input('email').'%')
        ->paginate(4);


        return view('app.fornecedor.listar',['fornecedores' => $fornecedores, 'request' => $request->all() ]);
    }
    public function adicionar(Request $request) {

        $msg = '';

        if($request->input('_token') != '' && $request->input('id') == ''){
          

            $regras = [
                'nome' => 'required|max:40',
                'site' => 'required',
                'uf' => 'required|min:2|max:2',
                'email' => 'email'
            ];

            $feedback = [

                'required' => 'O campo :attribute deve ser preenchido',
                'nome.max' => 'O campo nome deve ter no máximo 40 caracteres',
                'uf.min' => 'O campo UF deve ter no mínimo 2 caracteres',
                'uf.max' => 'O campo UF deve ter no máximo 2 caracteres',
                'email' => 'O campo email não foi preenchido corretamente'


            ];
            $request->validate($regras,$feedback);
            $fornecedor = new Fornecedor();
            $fornecedor->create($request->all());

            $msg = 'Cadastro Realizado com Sucesso!';
        }

        //print_r($request->all());

        if($request->input('_token') != '' && $request->input('id') != ''){
            $fornecedor = Fornecedor::find($request->input('id'));

            $update = $fornecedor->update($request->all());

            if($update){
                $msg = 'Atualização Realizada com sucesso';
            }else{
                $msg = 'Erro ao tentar atualizar o registro';
            }
            return redirect()->route('app.fornecedor.editar', ['id' => $request->input('id'),'msg' => $msg]);
         }
        return view('app.fornecedor.adicionar', ['msg' => $msg]);
    }
    
    public function editar($id,  $msg = ''){
        $fornecedor = Fornecedor::find($id);
        return view('app.fornecedor.adicionar', ['fornecedor' => $fornecedor, 'msg' => $msg]);
        

    }
    public function excluir($id){
        Fornecedor::find($id)->delete();

        return redirect()->route('app.fornecedor');
    } 
}
 