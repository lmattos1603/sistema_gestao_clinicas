@extends('template')

@section('conteudo')
	<table class="table table-striped mt-3">
            <thead class="thead-dark">
                <tr>
                <th scope="col">Nome</th>
                <th scope="col">CPF</th>
                <th scope="col">RG</th>
                <th scope="col">Data Nascimento</th>
                <th scope="col">#</th>
                </tr>
            </thead>
            <tbody>
            @foreach ($profissionais as $prof)
            <tr>
                <td>{{ $prof->nome }}</td>
                <td>{{ $prof->cpf }}</td>
                <td>{{ $prof->rg }}</td>
                <td>{{ $prof->nascimento }}</td>
                <td>
                    <a href="{{ route('cadastro_especialidade', ['id' => $prof->id]) }}" class="btn btn-info">Especialidades</a>
                    <a href="{{ route('listar_agenda_prof', ['id' => $prof->id]) }}" class="btn btn-success">Agenda</a>
                    <a class="btn btn-warning" href="{{route('profissional_alterar', ['id'=>$prof->id])}}"> Alterar</a>
                    <a href="#" onclick="exclui({{ $prof->id }})" class="btn btn-danger">Excluir</a></td>
                </td>
            </tr>
            @endforeach
            </tbody>
        </table>

        <script>
            function exclui(id){
                if (confirm("Deseja excluir o Profissional de id: "+id+"?")){
                    location.href = "/profissional/excluir/" + id;
                }
            }
        </script>
@endsection