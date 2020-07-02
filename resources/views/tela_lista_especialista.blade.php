@extends('template')

@section('conteudo')
<h1>Profissionais  {{ $especialidade->nome }}</h1>
	<table class="table table-striped mt-3">
            <thead class="thead-dark">
           <tr>
            <th>ID</th>
            <th>Nome</th>
            <th>Operações</th>
        </tr>
    </thead>
    <tbody>
        @foreach($especialidade->profissionais as $p)
        <tr>
            
            <td>{{ $p->pivot->id }}</td>
            <td>{{ $p->nome }}</td>
            <td><a href="{{ route('listar_agenda_prof', ['id' => $p->id]) }}" class="btn btn-success">Agenda</a></td>
        </tr>
        @endforeach
    </tbody>
            </tbody>
        </table>
@endsection