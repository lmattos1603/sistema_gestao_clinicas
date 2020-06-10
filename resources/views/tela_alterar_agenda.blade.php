@extends('template')

@section('conteudo')       
        <div class="container mt-3">
            <div class="row">
                <div class="col-md-12">
                    <nav class="navbar navbar-dark bg-dark">
                        <h4 style="color: white;">Alterar Agenda</h4>
                    </nav>
                </div>
            </div>
            <form method="post" action="{{ route('agenda_alterar', [ 'id' => $agenda->id ]) }}">
                @csrf
                <div class="form-group mt-5">
                <h6>Cliente</h6>
                <select class="form-control" name="id_cliente" type="text" disable readonly>
                    <option value="{{ $c->id }}">{{ $c->nome }}</option>
                </select>
                <h6>Profissional</h6>
                <select class="form-control" name="id_profissional" type="text" disable readonly>
                    <option value="{{ $p->id }}">{{ $p->nome }}</option>
                </select>
                <div class="form-group">
                    <h6>Data</h6>
                    <input type="date" class="form-control" name="data" value="{{$agenda->data}}" required>
                </div>
                <div class="form-group">
                    <h6>Hora</h6>
                    <input type="time" class="form-control" name="hora" value="{{$agenda->hora}}" required>
                </div>
            </div>
            <div class="col-md-6 ">
                <button type="submit" class="btn btn-dark">Alterar</button>
                <a class="btn btn-info" href="{{ route('lista_agenda') }}">Cancelar</a>
            </div>
            </form>
        </div>
@endsection