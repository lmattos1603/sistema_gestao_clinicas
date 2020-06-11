@extends('template')

@section('conteudo')
	<table class="table table-striped mt-3">
            <thead class="thead-dark">
                <tr>
                <th scope="col">Nome</th>
                <th scope="col">Telefone</th>
                @if(Auth::user()->ehProfissional())
                <th scope="col">Operações</th>
                @endif
                </tr>
            </thead>
            <tbody>
            @foreach ($convenios as $conv)
            <tr>
                <td>{{ $conv->nome }}</td>
                <td>{{ $conv->telefone }}</td>
                @if(Auth::user()->ehProfissional())
                <td>
                    <a class="btn btn-warning" href="{{ route('convenio_update', [ 'id' => $conv->id ]) }}">Alterar</a>
                <a href="#" onclick="exclui({{ $conv->id }})" class="btn btn-danger">Excluir</a>
                </td>
                @endif
            </tr>
            @endforeach
            </tbody>
        </table>

        <script>
            function exclui(id){
                if (confirm("Deseja excluir a agenda de id: "+id+"?")){
                    location.href = "/convenio/excluir/" + id;
                }
            }
        </script>
@endsection