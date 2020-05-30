@extends('template')

@section('conteudo')       
        <div class="container mt-3">
            <div class="row">
                <div class="col-md-12">
                    <nav class="navbar navbar-dark bg-dark">
                        <h4 style="color: white;">Cadastro de Profissionais</h4>
                    </nav>
                </div>
            </div>
            <form method="post" action="{{ route('profissional_add') }}">
                @csrf
                <div class="form-group mt-5">
                    <h6>Nome Completo</h6>
                    <input type="text" class="form-control" name="nome" placeholder="Seu nome" required>
                </div>
                <div class="form-group">
                    <h6>CPF</h6>
                    <input type="text" class="form-control" name="cpf" placeholder="Seu CPF" required>
                </div>
                <div class="form-group">
                    <h6>RG</h6>
                    <input type="text" class="form-control" name="rg" placeholder="Seu RG" required>
                </div>
                <div class="form-group">
                    <h6>Data de Nascimento</h6>
                    <input type="date" class="form-control" name="nascimento" required>
                </div>
                <div class="col-md-6">
                    <button type="submit" class="btn btn-dark">Cadastrar</button>
                </div>
            </form>
        </div>
@endsection