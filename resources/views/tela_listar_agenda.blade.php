@extends('template')

@section('conteudo')
	<table class="table table-striped mt-3">
            <thead class="thead-dark">
                <tr>
                <th scope="col">Cliente</th>
                <th scope="col">Profissional</th>
                <th scope="col">Data</th>
                <th scope="col">Hora</th>
                <th scope="col">Operações</th>
                </tr>
            </thead>
            <tbody>
            @foreach ($agenda as $ag)
            <tr>
                <td>{{ $ag->clientes->nome }}</td>
                <td>{{ $ag->profissionais->nome }}</td>
                <td>{{ $ag->data }}</td>
                <td>{{ $ag->hora }}</td>
                <td><a href="{{ route('tela_alterar', ['id' => $ag->id]) }}" class="btn btn-warning">Alterar</a>
                    <a href="#" onclick="exclui({{ $ag->id }})" class="btn btn-danger">Excluir</a>
                </td>
            </tr>
            @endforeach
            </tbody>
        </table>

        <script>
            function exclui(id){
                if (confirm("Deseja excluir a agenda de id: "+id+"?")){
                    location.href = "/agenda/excluir/" + id;
                }
            }
        </script>
@endsection