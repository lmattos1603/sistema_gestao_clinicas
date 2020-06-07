@extends ('template')
@section('conteudo')

<h1>Agendamento</h1>
<form method="POST" action="{{ route('agenda_update', ['id'=>$ag->id]) }}">
    @csrf
    <h6>Cliente</h6>
    <input type="text" name="id_cliente" class="form-control" value="{{$ag->id_cliente}}">
    <h6 class="mt-2">Profissional</h6>
     <select class="form-control" name="profi type="text">
                    @foreach ($profissional as $p)
                        <option value="{{ $p->id }}">{{ $p->nome }}</option>
                    @endforeach 
    </select>
    <br>
    <h6 class="mt-2">ID Profissional</h6>
    <input type="text" name="id_profissional" class="form-control" value="{{$ag->id_profissional=$p->id}}">
     <h6 class="mt-2">Data</h6>
    <input type="date" name="data" class="form-control" value="{{$ag->data}}">
     <h6 class="mt-2">Hora</h6>
    <input type="time" name="hora" class="form-control" value="{{$ag->hora}}">
    <br>
    <input type="submit" class="btn btn-secondary btn-lg mt-3" value="Cadastrar" class=>
</form> 
@endsection