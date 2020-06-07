@extends('template')

@section('conteudo')
	<table class="table table-striped mt-3">
            <thead class="thead-dark">
                <tr>
                <th scope="col">Cliente</th>
                <th scope="col">Profissional</th>
                <th scope="col">Data</th>
                <th scope="col">Hora</th>
                </tr>
            </thead>
            <tbody>
            @foreach ($agendas as $ag)
            <tr>
                <td>{{ $ag->clientes->nome }}</td>
                <td>{{ $ag->profissionais->nome }}</td>
                <td>{{ $ag->data }}</td>
                <td>{{ $ag->hora }}</td>
            </tr>
            @endforeach
            </tbody>
        </table>
@endsection