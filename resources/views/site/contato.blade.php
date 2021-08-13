@extends('site.layout.basico')
@section('titulo', 'Contato')

@section('conteudo')
    <div class="conteudo-pagina">
        <div class="titulo-pagina">
            <h1>Entre em contato conosco</h1>
        </div>

        <div class="informacao-pagina">
            <div class="contato-principal">

               @component('site.layout._components.form_contato', ['motivo_contatos' => $motivo_contatos])
               @endcomponent
            </div>
        </div>
    </div>
@include('site.layout._partials.rodape')
@endsection