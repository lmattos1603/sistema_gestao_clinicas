@extends('template')

    @section('conteudo')
    <div class="container mt-3">
        <div class="row">
            <div class="col-md-12">
                <nav class="navbar navbar-dark bg-dark">
                    <h4 style="color: white;">Cadastrar Convênios do(a) Cliente #{{ $clientes->nome }}</h4>
                </nav>
            </div>
        </div>
        <form method="post" action="{{ route('add_convenios', [ 'id' => $clientes->id ]) }}">
            @csrf
            <div class="form-group mt-5">
                <h6>Convênio</h6>
                <select class="form-control" name="id_convenio" type="text">
                    @foreach ($convenios as $c)
                        <option value="{{ $c->id }}">{{ $c->nome }}</option>
                    @endforeach
                </select>
            </div>
            <div class="col-md-6 ">
                <button type="submit" class="btn btn-secondary">Cadastrar</button>
            </div>
        </form>
        <h2 class="mt-5">Convênios Adicionados</h2>
        <table class="table table-striped">
            <thead class="thead-dark">
                <tr>
                <th scope="col">Convenio</th>
                <th scope="col">Nome</th>
                <th scope="col">Telefone</th>
                </tr>
            </thead>
            <tbody>
            @foreach ($clientes->convenios as $cc)
            <tr>
                <td>{{ $cc->pivot->id }}</td>
                <td>{{ $cc->nome }}</td>
                <td>{{ $cc->telefone }}</td>
            </tr>
            @endforeach
            </tbody>
        </table>
    </div>
@endsection