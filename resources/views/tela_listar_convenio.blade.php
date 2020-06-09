@extends('template')

@section('conteudo')
	<table class="table table-striped mt-3">
            <thead class="thead-dark">
                <tr>
                <th scope="col">Nome</th>
                <th scope="col">Telefone</th>
                <th scope="col">Operações</th>
                </tr>
            </thead>
            <tbody>
            @foreach ($convenios as $conv)
            <tr>
                <td>{{ $conv->nome }}</td>
                <td>{{ $conv->telefone }}</td>
                <td>
                    <a class="btn btn-warning" href="{{route('convenio_alterar', ['id'=>$conv->id])}}"> Alterar</a>
                    <a href="#" onclick="exclui({{ $conv->id }})" class="btn btn-danger">Excluir</a></td>
                </td>
            </tr>
            @endforeach
            </tbody>
        </table>

        <script>
            function exclui(id){
                if (confirm("Deseja excluir o Convênio de id: "+id+"?")){
                    location.href = "/convenio/excluir/" + id;
                }
            }
        </script>
@endsection