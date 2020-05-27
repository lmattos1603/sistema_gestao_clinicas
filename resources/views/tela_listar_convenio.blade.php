@extends('template')

@section('conteudo')
	<table class="table table-striped mt-3">
            <thead class="thead-dark">
                <tr>
                <th scope="col">Nome</th>
                <th scope="col">Telefone</th>
                </tr>
            </thead>
            <tbody>
            @foreach ($convenios as $conv)
            <tr>
                <td>{{ $conv->nome }}</td>
                <td>{{ $conv->telefone }}</td>
            </tr>
            @endforeach
            </tbody>
        </table>
@endsection