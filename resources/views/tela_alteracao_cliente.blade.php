@extends ('template')
@section('conteudo')

<h1>Cliente</h1>
<form method="POST" action="route('cliente_alterar', ['id'=>$c->id]">
	@csrf
	<h6>Nome</h6>
	<input type="text" name="nome"  value="{{$c-> nome}}">
	<h6 class="mt-2">RG</h6>
	<input type="text" name="rg"  value="{{$c-> rg}}">
	<h6 class="mt-2">CPF</h6>
	<input type="date" name="cpf"  value="{{$c-> cpf}}">
	<h6 class="mt-2">Data_nascimento</h6>
	<input type="date" name="data_nascimento"  value="{{$c-> data_nascimento}}">
	<h6 class="mt-2">E-mail</h6>
	<input type="date" name="email"  value="{{$c-> email}}>
	<h6 class="mt-2">Senha</h6>
	<input type="password" name="senha"  value="{{$c-> senha}}">

	<br>
	<input type="submit" class="btn btn-secondary btn-lg mt-3" value="Cadastrar" class=>
</form>	
@endsection