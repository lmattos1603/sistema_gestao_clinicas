@extends ('template')
@section('conteudo')

<h1>Especialidade</h1>
<form method="POST" action="{{ route('especialidade_alterar', ['id'=>$espec->id]) }}">
	@csrf
	<h6>Nome</h6>
	<input type="text" name="nome" value="{{$espec-> nome}}">
	<h6 class="mt-2">Descrição</h6>
	<input type="text" name="descricao" value="{{$espec-> descricao}}">
	<br>
	<input type="submit" class="btn btn-secondary btn-lg mt-3" value="Cadastrar" class=>
</form>	
@endsection