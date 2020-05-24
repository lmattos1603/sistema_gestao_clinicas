@extends('template')
@section('conteudo')
					<h1>Alterar cadastro convenio</h1>
					<form method="POST" action="{{ route('convenio_alterar', ['id'=>$c->id]) }}">
						@csrf
						<h6>Nome</h6>
						<input type="text" name="nome" value="{{$c-> nome}}">
						<h6 class="mt-2">CEP</h6>
						<input type="text" name="cep" value="{{$c-> telefone}}">
						<input type="submit" class="btn btn-secondary btn-lg mt-3" value="Salvar" class=>
					</form>
@endsection