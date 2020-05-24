@extends('template')
@section('conteudo')
				<nav class="navbar navbar-dark bg-dark mt-1" id=tes1>
					<a class="navbar-brand">Lista de Especialidades</a>
					<form class="form-inline">
						<input class="form-control mr-sm-2" type="search" placeholder="..." aria-label="Search">
						<button class="btn btn-outline-success my-2 my-sm-0" type="submit">Filtrar</button>
					</form>
				</nav>
<div class="table-responsive">
	<table class="table table-striped table-dark">
		<thead>
			<tr>
				<th scope="col"scope="col">Id</th>
				<th scope="col">Nome</th>
				<th scope="col">Descrição</th>
			</tr>
		</thead>
		<tbody>
			@foreach($espec as $e)
			<tr>
				<td>{{$e->id}}</td>
				<td>{{$e->nome}}</td>
				<td>{{$e->descricao}}</td>
				<td>
					<a class="btn btn-warning" href="{{route('especialidade_tela_alterar', ['id'=>$c->id])}}"> Alterar</a>
					<a class="btn btn-danger" href="#" onclick="exclui({{$e->id}})">Excluir</a>
					<a class="btn btn-succes" href="">Profissionais Relacionados</a>*/
				</td>
			</tr>
			@endforeach
		</tbody>
	</table>
</div>
<script>
	function exclui(id){
		if (confirm("Deseja excluir a especialidade de id: " + id + "?")){
			location.href = "/especialidade/excluir/" + id;
		}
	}
</script>
@endsection