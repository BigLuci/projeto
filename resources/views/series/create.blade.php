@extends('layout')

@section('cabecalho')
Adicionar Serie
@endsection        

@section('conteudo')
    
<form method="post">
    @csrf
    <div class="form-group mb-2">
        <label for="nome">Nome</label>
        <input type="text" class="form-control" name="nome" id="nome">
    </div>            

        <button class="bnt btn-primery">Adicionar</button>
</form>
@endsection
