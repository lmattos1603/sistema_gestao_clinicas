<style>
    h5{
        color: #FF0000;
    }
</style>
@extends('template')

@section('conteudo')

<div class="card-group">
@foreach ($especialidades as $esp)
  <div class="card">
   <img src="{{ asset($esp->imagem) }}" width="200">
    <div class="card-body">
      <h5 class="card-title">{{ $esp->nome }}</h5>
      <p class="card-text">Descrição:{{ $esp->descricao }}</p>
  </div>
  <div class="card-footer">
      <small class="text-muted"><a href="{{ route('especialidade_prof', ['id' => $esp->id]) }}" class="btn btn-info">Listar Profissionais</a></small>
  </div>
</div>
@endforeach

@endsection