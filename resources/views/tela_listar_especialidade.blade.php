@extends('template')

@section('conteudo')
	<table class="table table-striped mt-3">
            <thead class="thead-dark">
                <tr>
                <th scope="col">Nome</th>
                <th scope="col">Descrição</th>
                <th scope="col">Operações</th>
                <th scope="col">Profissionais</th>
                </tr>
            </thead>
            <tbody>
            @foreach ($especialidades as $esp)
            <tr>
                <td>{{ $esp->nome }}</td>
                <td>{{ $esp->descricao }}</td>
                                <td>
                    <a class="btn btn-warning" href="{{ route('especialidade_update', [ 'id' => $esp->id ]) }}">Alterar</a>
              <a href="#" onclick="exclui({{ $esp->id }})" class="btn btn-danger">Excluir</a></td>
              <td>   <a href="{{ route('especialidade_prof', ['id' => $esp->id]) }}" class="btn btn-info">Listar Profissionais</a></td>
            </tr>
            @endforeach
            </tbody>
        </table>

        <script>
            function exclui(id){
                if (confirm("Deseja excluir a agenda de id: "+id+"?")){
                    location.href = "/especialidade/excluir/" + id;
                }
            }
        </script>
@endsection