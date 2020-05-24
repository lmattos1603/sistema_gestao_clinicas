@extends ('template')
@section('conteudo')

<h1>Cadastro de Convenio</h1>
<form method="POST" action="{{ route('convenio_add') }}">
	@csrf
	<h6>Nome</h6>
	<input type="text" name="nome" placeholder="Unimed">
	<h6 class="mt-2">Telefone</h6>
	<input type="text" name="rg" placeholder="(49)99999-9999">
	<br>
	<input type="submit" class="btn btn-secondary btn-lg mt-3" value="Cadastrar" class=>
</form>	
@endsection