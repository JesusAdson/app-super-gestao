@extends('app.layout.basico')

@section('titulo', 'Fornecedor')

@section('conteudo')
    <div class="conteudo-pagina">
        <div class="titulo-pagina-2">
            <p>Fornecedor - Adicionar</p>
        </div>
        <div class="menu">
            <ul>
                <li><a href="{{route('app.fornecedor.adicionar')}}">Novo</a></li>
                <li><a href="{{route('app.fornecedor')}}">Consulta</a></li>
            </ul>
        </div>
        <div class="informacao-pagina">
            {{$msg ?? ''}}
            <div style="width: 30%;margin-left: auto;margin-right:auto;">
                <form action="{{route('app.fornecedor.adicionar')}}" method="post">
                    @csrf
                    <input type="hidden" name="id" value="{{$fornecedor->id ?? ''}}">
                    <input type="text" value="{{ $fornecedor->nome ?? old('nome')}}" name="nome" placeholder="Nome" class="borda-preta">
                    {{$errors->has('nome') ? $errors->first() : ''}}
                    <input type="text" value="{{ $fornecedor->site ?? old('site')}}" name="site" placeholder="Site" class="borda-preta">
                    {{$errors->has('site') ? $errors->first() : ''}}
                    <input type="text" value="{{ $fornecedor->uf ?? old('uf')}}" name="uf" placeholder="UF" class="borda-preta">
                    {{$errors->has('uf') ? $errors->first() : ''}}
                    <input type="text" value="{{ $fornecedor->email ?? old('email')}}" name="email" placeholder="Email" class="borda-preta">
                    {{$errors->has('email') ? $errors->first() : ''}}
                    <button type="submit" class="borda-preta">Cadastrar</button>
                </form>
            </div>
        </div>
    </div>
@endsection