@extends('layout')

@section('cabecalho')    
Series
@endsection

@section('conteudo')
@if (!empty($mensagem))
<div class="alert alert-success">
    {{ $mensagem }}
</div>    
@endif


<a href="/series/criar" class="btn btn-dark mb-2">Adicionar</a>

<ul class="list-group">
    <?php foreach ($series as $serie): ?>
    <li class="list-group-item"><?= $serie->nome; ?></li> 
    {{-- {{$serie->nome}} sintaxe do blade--}}

    <form method="post" action="/series/{{ $serie->id}}"
        onsubmit="return confirm('Tem certeza que deseja remover {{ addslashes ($serie->nome)}}?')">
        @csrf
        @method('DELETE')
        <button class="btn btn-danger">Excluir</button>
    </form>
    
    <?php endforeach; ?>
</ul>
@endsection tua mae