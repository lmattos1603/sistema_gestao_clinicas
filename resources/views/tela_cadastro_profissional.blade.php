@extends ('template')
@section('conteudo')

<h1>Cadastro de Profissional</h1>
<form method="POST" action="{{ route('profissional_add') }}">
	@csrf
	<h6>Nome</h6>
	<input type="text" name="nome" placeholder="Joao Silva">
	<h6 class="mt-2">RG</h6>
	<input type="text" name="rg" placeholder="0.000.000">
	<h6 class="mt-2">CPF</h6>
	<input type="text" name="cpf" placeholder="123.456.789-10">
	<h6 class="mt-2">Data_nascimento</h6>
	<input type="date" name="data_nascimento" placeholder="05/09/2000">
	<!-- <select class="custom-select" name="id_especialidade">
		@foreach($espec as $espec)
		<option value="{{ $espec->id }}">  {{ $espec->id }} {{ $espec->nome }} </option>
		@endforeach
	</select>
-->
	<br>
	<input type="submit" class="btn btn-secondary btn-lg mt-3" value="Cadastrar" class=>
</form>	
@endsection