@extends('template')

@section('conteudo')
<h1>Profissionais  {{ $especialidade->nome }}</h1>
	<table class="table table-striped mt-3">
            <thead class="thead-dark">
           <tr>
            <th>ID</th>
            <th>Nome</th>
            <th>Valor da Consulta</th>
            <th>Operações</th>
        </tr>
    </thead>
    <tbody>
        @foreach($especialidade->profissionais as $p)
        <tr>
            
            <td>{{ $p->pivot->id }}</td>
            <td>{{ $p->nome }}</td>
            <td>R${{ $p->valor_consulta }}</td>
            <td>
                <a href="{{ route('listar_agenda_prof', ['id' => $p->id]) }}" class="btn btn-info">Agenda</a>
                <a href="{{ route ('agenda_cadastro_especialista', ['id' => $p->id]) }}" class="btn btn-success">Agendar consulta</a>
            </td>
        </tr>
        @endforeach
    </tbody>
            </tbody>
        </table>
@endsection