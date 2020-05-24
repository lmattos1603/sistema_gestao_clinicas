@extends ('template')
@section('conteudo')

<h1>Cadastro de Especialidade</h1>
<form method="POST" action="{{ route('especialidade_add') }}">
	@csrf
	<h6>Nome</h6>
	<input type="text" name="nome" placeholder="Psicólogo">
	<h6 class="mt-2">Descrição</h6>
	<input type="text" name="descricao" placeholder="Psico-análise">
	<input type="submit" class="btn btn-secondary btn-lg mt-3" value="Cadastrar" class=>
</form>	
@endsection