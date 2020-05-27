@extends('template')

@section('conteudo')       
        <div class="container mt-3">
            <div class="row">
                <div class="col-md-12">
                    <nav class="navbar navbar-dark bg-dark">
                        <h4 style="color: white;">Cadastrar Agenda</h4>
                    </nav>
                </div>
            </div>
            <form method="post" action="{{ route('agenda_add') }}">
                @csrf
                <div class="form-group mt-5">
                <h6>Cliente</h6>
                <select class="form-control" name="id_cliente" type="text">
                    @foreach ($clientes as $c)
                        <option value="{{ $c->id }}">{{ $c->nome }}</option>
                    @endforeach
                </select>
                <h6>Profissional</h6>
                <select class="form-control" name="id_profissional" type="text">
                    @foreach ($profissionais as $p)
                        <option value="{{ $p->id }}">{{ $p->nome }}</option>
                    @endforeach
                </select>
                <div class="form-group">
                    <h6>Data</h6>
                    <input type="date" class="form-control" name="data" placeholder="Telefone para Contato" required>
                </div>
                <div class="form-group">
                    <h6>Hora</h6>
                    <input type="time" class="form-control" name="hora" placeholder="Telefone para Contato" required>
                </div>
            </div>
            <div class="col-md-6 ">
                <button type="submit" class="btn btn-secondary">Cadastrar</button>
            </div>
            </form>
        </div>
@endsection