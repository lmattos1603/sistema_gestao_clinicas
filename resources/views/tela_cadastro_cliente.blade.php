@extends ('template')
@section('conteudo')

<h1>Cadastro de Clientes</h1>
<form method="POST" action="{{ route('cliente_add') }}">
	@csrf
	<h6>Nome</h6>
	<input type="text" name="nome" placeholder="Joao Silva">
	<h6 class="mt-2">RG</h6>
	<input type="text" name="rg" placeholder="123.456.789-10">
	<h6 class="mt-2">CPF</h6>
	<input type="text" name="cpf" placeholder="123.456.789-10">
	<h6 class="mt-2">Data_nascimento</h6>
	<input type="date" name="data_nascimento" placeholder="Santa Catarina">
		<h6 class="mt-2">Telefone</h6>
	<input type="text" name="telefone" placeholder="Av. Brasil">
	<h6 class="mt-2">E-mail</h6>
	<input type="text" name="email" placeholder="Florianopolis">
	<h6 class="mt-2">Senha</h6>
	<input type="password" name="senha" placeholder="Av. Brasil">
	<br>
	<input type="submit" class="btn btn-secondary btn-lg mt-3" value="Cadastrar" class=>
</form>	
@endsection