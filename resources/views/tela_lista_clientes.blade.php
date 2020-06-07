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
                <th scope="col">#</th>
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
                <td><a href="{{ route('cadastro_convenio', ['id' => $cli->id]) }}" class="btn btn-info">Convênios</a>
                    <a href="{{ route('listar_agenda_cliente', ['id' => $cli->id]) }}" class="btn btn-success">Consultas</a></td>
            </tr>
            @endforeach
            </tbody>
        </table>
@endsection