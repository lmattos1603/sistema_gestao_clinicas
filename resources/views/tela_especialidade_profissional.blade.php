@extends('template')

    @section('conteudo')
    <div class="container mt-3">
        <div class="row">
            <div class="col-md-12">
                <nav class="navbar navbar-dark bg-dark">
                    <h4 style="color: white;">Cadastrar Especialidades do Profissional #{{ $profissionais->nome }}</h4>
                </nav>
            </div>
        </div>
        <form method="post" action="{{ route('add_especialidades', [ 'id' => $profissionais->id ]) }}">
            @csrf
            <div class="form-group mt-5">
                <h6>Especialidade</h6>
                <select class="form-control" name="id_especialidade" type="text">
                    @foreach ($especialidades as $e)
                        <option value="{{ $e->id }}">{{ $e->nome }}</option>
                    @endforeach
                </select>
            </div>
            <div class="col-md-6 ">
                <button type="submit" class="btn btn-secondary">Cadastrar</button>
            </div>
        </form>
        <h2 class="mt-5">Especialidades Adicionadas</h2>
        <table class="table table-striped">
            <thead class="thead-dark">
                <tr>
                <th scope="col">Especialidade</th>
                <th scope="col">Nome</th>
                <th scope="col">Descrição</th>
                </tr>
            </thead>
            <tbody>
            @foreach ($profissionais->especialidades as $pe)
            <tr>
                <td>{{ $pe->pivot->id }}</td>
                <td>{{ $pe->nome }}</td>
                <td>{{ $pe->descricao }}</td>
            </tr>
            @endforeach
            </tbody>
        </table>
    </div>
@endsection