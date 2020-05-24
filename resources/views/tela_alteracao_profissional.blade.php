@extends ('template')
@section('conteudo')

<h1>Cadastro de Clientes</h1>
<form method="POST" action="{{ route('profissional_alterar', ['id'=>$prof->id]) }}">
	@csrf
	<h6>Nome</h6>
	<input type="text" name="nome" value="{{$prof-> nome}}">
	<h6 class="mt-2">RG</h6>
	<input type="text" name="rg" value="{{$prof-> rg}}">
	<h6 class="mt-2">CPF</h6>
	<input type="text" name="cpf" value="{{$prof-> cpf}}">
	<h6 class="mt-2">Data_nascimento</h6>
	<input type="text" name="data_nascimento" value="{{$prof-> data_nascimento}}">
	<h6 class="mt-2">Especialidade</h6>
	<input type="text" name="id_especialidade" value="{{$prof-> id_especialidade}}">
	<br>
	<input type="submit" class="btn btn-secondary btn-lg mt-3" value="Cadastrar" class=>
</form>	
@endsection