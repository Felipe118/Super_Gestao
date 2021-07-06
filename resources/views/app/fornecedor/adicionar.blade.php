@extends('app.layouts.basico')
@section('titulo', 'Fornecedor')

@section('conteudo')

    <div class="conteudo-pagina">

        <div class="titulo-pagina-2">
            <p>Fornecedor - Adicionar</p>
        </div>
        <div class="menu">
            
            <ul>
                <li><a href="{{ route('app.fornecedor.adicionar') }}">Novo</a></li>
                <li><a href="{{ route('app.fornecedor')}}">Consulta</a></li>
              
            </ul>

        </div>
       
      
        <div class="informacao-pagina">
            <div style="color: rgb(38, 155, 38)">
                {{ $msg ?? '' }}
            </div>
            <div style="width:30%; margin-left:auto; margin-right:auto;">
                <form action="{{ route('app.fornecedor.adicionar') }}" method="POST">
                    @csrf

                    <input type="hidden" name="id" value="{{ $fornecedor->id ?? ''}}">

                    <input type="text" name="nome" placeholder="Nome"  value="{{ $fornecedor->nome ?? old('nome') }}" class="borda-preta" id="">
                    {{ $errors->has('nome') ? $errors->first('nome') : '' }}
                    
                    <input type="text" name="site" placeholder="Site" value="{{ $fornecedor->site ?? old('site') }}" class="borda-preta" id="">
                    {{ $errors->has('site') ? $errors->first('site') : '' }}
                    
                    <input type="text" name="uf" value="{{ $fornecedor->uf ?? old('uf') }}" placeholder="UF"  class="borda-preta" id="">
                    {{ $errors->has('uf') ? $errors->first('uf') : ''  }}
                    
                    <input type="text" name="email" value="{{ $fornecedor->email ?? old('email') }}" placeholder="E-mail" class="borda-preta" id="">
                    {{$errors->has('email') ? $errors->first('email') : ''}}
                    <button type="submit" class="borda-preta">Cadastrar</button>
                </form>
            </div>

        </div>

    </div>

@endsection
