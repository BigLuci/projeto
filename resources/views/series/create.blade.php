@extends('layout')

@section('cabecalho')
Adicionar Serie
@endsection        

@section('conteudo')

@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
    
<form method="post">
    @csrf
    <div class="row">
        <div class="col col-8">
            <label for="nome">Nome</label>
            <input type="text" class="form-control" name="nome" id="nome">
        </div>       
         
        <div class="col col-1">
            <label for="qtd_temporadas">Temporadas</label>
            <input type="number" min="0" class="form-control" name="qtd_temporadas" id="qtd_temporadas">
        </div>

        <div class="col col-1">
            <label for="qtd_episodios">Episodios</label>
            <input type="number" min="0" class="form-control" name="qtd_episodios" id="qtd_episodios">
        </div>

    </div>

    

        <button class="bnt btn-primary mt-2">Adicionar</button>
</form>
@endsection
