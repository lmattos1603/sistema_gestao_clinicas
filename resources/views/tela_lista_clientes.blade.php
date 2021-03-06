@extends('template')

@section('conteudo')
	<table class="table table-striped mt-3">
            <thead class="thead-dark">
                <tr>
                <th scope="col">Nome</th>
                <th scope="col">CPF</th>
                <th scope="col">RG</th>
                <th scope="col">Data Nascimento</th>
                <th scope="col">Telefone</th>
                <th scope="col">E-mail</th>
                <th scope="col">Convênio</th>
                <th scope="col">Agendar</th>
                <th scope="col">Operações</th>
                </tr>
            </thead>
            <tbody>
            @foreach($clientes as $cli)
            <tr>
                <td>{{ $cli->nome }}</td>
                <td>{{ $cli->cpf }}</td>
                <td>{{ $cli->rg }}</td>
                <td>{{ $cli->nascimento }}</td>
                <td>{{ $cli->telefone }}</td>
                <td>{{ $cli->email }}</td>
                <td>
                    <a href="{{ route('cadastro_convenio', ['id' => $cli->id]) }}" class="btn btn-info">Convênios</a>
                </td>
                 <td>
                    <a href="{{ route('listar_agenda_cliente', ['id' => $cli->id]) }}" class="btn btn-success">Consultas</a>
                </td>
                <td>
                    <a class="btn btn-warning" href="{{ route('cliente_update', [ 'id' => $cli->id ]) }}">Alterar</a>
                    <a href="#" onclick="exclui({{ $cli->id }})" class="btn btn-danger">Excluir</a>
                </td>
            </tr>
            @endforeach
            </tbody>
        </table>

        <script>
            function exclui(id){
                if (confirm("Deseja excluir a agenda de id: "+id+"?")){
                    location.href = "/cliente/excluir/" + id;
                }
            }
        </script>
@endsection