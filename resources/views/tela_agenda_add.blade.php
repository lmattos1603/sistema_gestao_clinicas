@extends('template')

@section('conteudo')       
        <div class="container mt-3">
            <div class="row">
                <div class="col-md-12">
                    <nav class="navbar navbar-dark bg-dark">
                        <h4 style="color: white;">Confirmar Consulta</h4>
                    </nav>
                </div>
            </div>
            <form method="post" action="{{ route('agenda_add') }}">
                @csrf
                <div class="form-group mt-5">
                <h6>Cliente</h6>
                <select class="form-control" name="id_cliente" type="text">
                    <option value="{{ $cliente->id }}">{{ $cliente->nome }}</option>
                </select>
                <h6>Profissional</h6>
                <select class="form-control" name="id_profissional" type="text">
                    <option value="{{ $profissional->id }}">{{ $profissional->nome }}</option>
                </select>
                <div class="form-group">
                    <h6>Data</h6>
                    <input type="text" class="form-control" name="data" value="{{$data}}" disable readonly required>
                </div>
                <div class="form-group">
                    <h6>Hora</h6>
                    <input type="text" class="form-control" name="hora" value="{{$hora}}" disable readonly required>
                </div>
                <div class="form-group">
                    <h6>Valor da Consulta</h6>
                    <input type="number" class="form-control" name="valor" value="{{ $profissional->valor_consulta }}" disable readonly required>
                </div>
            </div>
            <div class="col-md-6 ">
                <button type="submit" class="btn btn-dark">Prosseguir Para o Pagamento</button>
            </div>
            </form>
        </div>
@endsection