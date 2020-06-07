@extends('template')

@section('conteudo')
    <body>

        <div class="container mt-3">
            <div class="row">
                <div class="col-md-12">
                    <nav class="navbar navbar-dark bg-dark">
                        <h4 style="color: white;">Entrar no Sistema</h4>
                    </nav>
                </div>
            </div>
            <form method="post" action="{{ route('login') }}">
                @csrf
                <div class="form-group">
                    <h6>E-mail</h6>
                    <input type="email" class="form-control" name="email" placeholder="Digite o e-mail" >
                </div>
                <div class="form-group">
                    <h6>Senha</h6>
                    <input type="password" class="form-control" name="senha" placeholder="Digite sua senha" >
                </div>
                <div class="col-md-6">
                    <button type="submit" class="btn btn-dark">Entrar</button>
                </div>
            </form>
        </div>
    </body>
@endsection