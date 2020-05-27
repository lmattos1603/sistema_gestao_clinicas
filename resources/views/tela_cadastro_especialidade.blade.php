@extends('template')

@section('conteudo')       
        <div class="container mt-3">
            <div class="row">
                <div class="col-md-12">
                    <nav class="navbar navbar-dark bg-dark">
                        <h4 style="color: white;">Cadastro de Especialidades</h4>
                    </nav>
                </div>
            </div>
            <form method="post" action="{{ route('especialidade_add') }}">
                @csrf
                <div class="form-group mt-5">
                    <h6>Nome</h6>
                    <input type="text" class="form-control" name="nome" placeholder="Nome Especialidade" required>
                </div>
                <div class="form-group">
                    <h6>Descrição</h6>
                    <input type="text" class="form-control" name="descricao" required>
                </div>
                <div class="col-md-6">
                    <button type="submit" class="btn btn-secondary">Cadastrar</button>
                </div>
            </form>
        </div>
@endsection