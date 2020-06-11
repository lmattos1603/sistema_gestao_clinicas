@extends ('template')
@section('conteudo')

<h1>Cliente</h1>
<form method="POST" action="{{route('cliente_alterar', ['id'=>$c->id])}}">
	@csrf
	<h6>Nome</h6>
	<input type="text" name="nome" class="form-control" value="{{$c-> nome}}">
	<h6 class="mt-2">RG</h6>
	<input type="text" name="rg" class="form-control" value="{{$c-> rg}}">
	<h6 class="mt-2">CPF</h6>
	<input type="text" name="cpf" class="form-control" value="{{$c-> cpf}}">
	<h6 class="mt-2">Telefone</h6>
	<input type="text" name="telefone" class="form-control" value="{{$c-> telefone}}">
	<h6 class="mt-2">Data nascimento</h6>
	<input type="date" name="nascimento" class="form-control" value="{{$c-> nascimento}}">
	<h6 class="mt-2">E-mail</h6>
	<input type="email" name="email" class="form-control" value="{{$c-> email}}">
	<h6 class="mt-2">Senha</h6>
	<input type="password" name="senha" class="form-control" value="{{$c-> senha}}">

	<br>
	<input type="submit" class="btn btn-secondary btn-lg mt-3" value="Cadastrar" class=>
</form>	
@endsection