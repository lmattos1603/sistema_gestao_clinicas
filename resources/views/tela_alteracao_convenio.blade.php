@extends('template')

@section('conteudo')
	<h1>Alterar Convênio</h1>
	<form method="POST" action="{{ route('convenio_alterar', ['id'=>$c->id]) }}">
		@csrf
		<h6>Nome</h6>
		<input type="text" name="nome" class="form-control" value="{{$c-> nome}}">
		<h6 class="mt-2">telefone</h6>
		<input type="text" name="telefone" class="form-control" value="{{$c-> telefone}}">

		<input type="submit" class="btn btn-secondary btn-lg mt-3" value="Alterar" class=>
	</form>
@endsection