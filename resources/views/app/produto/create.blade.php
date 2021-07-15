@extends('app.layouts.basico')
@section('titulo', 'Produto')

@section('conteudo')

    <div class="conteudo-pagina">

        <div class="titulo-pagina-2">
            <p>Adicionar Produto</p>
        </div>
        <div class="menu">
            
            <ul>
                <li><a href="{{ route('produto.index')}}">Voltar</a></li>
                <li><a href="">Consulta</a></li>
              
            </ul>

        </div>
       
      
        <div class="informacao-pagina">
            
            <div style="width:30%; margin-left:auto; margin-right:auto;">
                <form action="{{ route('produto.store') }}" method="POST">
                    @csrf

                    

                    <input type="text" name="nome" placeholder="Nome"  value="{{ old('nome') }}" class="borda-preta" id="">
                    {{$errors->has('nome') ? $errors->first('nome') : ''}}
                    
                    <input type="text" name="descricao" placeholder="Descrição" value="{{ old('descricao') }}" class="borda-preta" id="">
                    {{$errors->has('descricao') ? $errors->first('descricao') : ''}}
                    
                    <input type="text" name="peso" value="{{ old('peso') }}" placeholder="peso"  class="borda-preta" id="">
                    {{$errors->has('peso') ? $errors->first('peso') : ''}}
                    <select name="unidade_id" >
                        <option>-- Selecione a unidade de medida --</option>

                        @foreach ($unidades as $unidade)
                            
                        @endforeach
                       
                        <option value="{{$unidade->id}} {{ old('unidade_id') == $unidade->id ? 'selected' : ''}}">{{$unidade->descricao}}</option>
                    </select>
                    {{$errors->has('unidade_id') ? $errors->first('unidade_id') : ''}}
                    
                    
                    <button type="submit" class="borda-preta">Cadastrar</button>
                </form>
            </div>

        </div>

    </div>

@endsection
