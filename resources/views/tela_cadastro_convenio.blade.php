@extends('template')

@section('conteudo')       
        <div class="container mt-3">
            <div class="row">
                <div class="col-md-12">
                    <nav class="navbar navbar-dark bg-dark">
                        <h4 style="color: white;">Cadastro de Convênios</h4>
                    </nav>
                </div>
            </div>
            <form method="post" action="{{ route('convenio_add') }}">
                @csrf
                <div class="form-group mt-5">
                    <h6>Nome</h6>
                    <input type="text" class="form-control" name="nome" placeholder="Nome Convênio" required>
                </div>
                <div class="form-group">
                    <h6>Telefone</h6>
                    <input type="text" class="form-control" name="telefone" placeholder="Telefone para Contato" required>
                </div>
                <div class="col-md-6">
                    <button type="submit" class="btn btn-secondary">Cadastrar</button>
                </div>
            </form>
        </div>
@endsection