@extends('template')

@section('conteudo')
	<table class="table table-striped mt-3">
            <thead class="thead-dark">
                <tr>
                <th scope="col">Nome</th>
                <th scope="col">Descrição</th>
                </tr>
            </thead>
            <tbody>
            @foreach ($especialidades as $esp)
            <tr>
                <td>{{ $esp->nome }}</td>
                <td>{{ $esp->descricao }}</td>
            </tr>
            @endforeach
            </tbody>
        </table>
@endsection