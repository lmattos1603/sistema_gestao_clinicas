<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <title>Gestão de Clínicas</title>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        @yield('scripts')
    </head>
    <body style=" background-image: url(https://medicalbox.com.br/blog/wp-content/uploads/2018/01/como-implementar-um-software-de-gestao-em-sua-clinica.jpeg);">
    <nav class="navbar navbar-expand-lg navbar-light bg-light">

        <img class="mr-3" src="http://localhost:8000/upload/imagens_especialidades/LOGO2.png" width="150">
        <a class="navbar-brand" href="{{ route('home') }}">Home</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Alterna navegação">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar navbar-nav">
                <?php
                    if(Auth::user()){
                ?>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                      Cliente
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                      @if(Auth::user()->ehProfissional())
                      <a class="dropdown-item" href="{{ route('cadastro_cliente') }}">Cadastrar Cliente</a>
                      <a class="dropdown-item" href="{{ route('listar_clientes') }}">Listar Clientes</a>
                      @endif
                      <a class="dropdown-item" href="{{ route('listar_cliente') }}">Meus Dados</a>
                    </div>
                  </li>

                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                      Convênios
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                      @if(Auth::user()->ehProfissional())
                      <a class="dropdown-item" href="{{ route('cadastrar_convenio') }}">Cadastrar Convênio</a>
                      @endif
                      <a class="dropdown-item" href="{{ route('listar_convenio') }}">Listar Convênios</a>
                    </div>
                  </li>
                  @if(Auth::user()->ehProfissional())
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                      Profissional
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                      <a class="dropdown-item" href="{{ route('cadastro_profissional') }}">Cadastrar Profissional</a>
                      <a class="dropdown-item" href="{{ route('listar_profissional') }}">Listar Profissionais</a>
                    </div>
                  </li>
                  @endif
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                      Especialidades
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                      @if(Auth::user()->ehProfissional())
                      <a class="dropdown-item" href="{{ route('cadastrar_especialidade') }}">Cadastrar Especialidade</a>
                      <a class="dropdown-item" href="{{ route('listar_especialidade') }}">Listar Especialidades</a>
                      @endif
                       <a class="dropdown-item" href="{{ route('listar_menu_especialidade') }}">Menu Especialidades</a>
                    </div>
                  </li>
                @if(Auth::user()->ehProfissional())
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                      Agendas
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                      <a class="dropdown-item" href="{{ route('agenda_cadastro') }}">Cadastrar Consulta</a>
                      <a class="dropdown-item" href="{{ route('listar_agenda') }}">Calendário de Consultas</a>
                      <a class="dropdown-item" href="{{ route('lista_agenda') }}">Listar Agendas</a>
                    </div>
                </li>
                @endif
                @if(Auth::user()->ehProfissional())
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                      Dashboard
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                      <a class="dropdown-item" href="{{ route('dashboard') }}">Agendamentos Diários</a>
                      <a class="dropdown-item" href="{{ route('dashboard_mensal') }}">Agendamentos mensais</a>
                    </div>
                </li>
                @endif
                <li class="nav-item">
                   <a class="nav-link disabled ml-5">Olá, {{ Auth::user()->name }}</a>
                </li>
            </ul>

            <ul class="nav navbar-nav navbar-right">
              <li>
                <a class="nav-link" href="{{ route('logout') }}">Logout</a>
              </li>
            </ul>
            <?php
                }
            ?>
            
        </div>
    </nav>
        <div class="container">
            <div class="row">
                <div class="col-md-1"></div>
                <div class="col-md-12" style="background-color: #ede4e4;">
                  @if(session()->has('mensagem'))
                    <div class="alert alert-danger">{{session('mensagem')}}</div>
                    {{ session()->forget(['mensagem']) }}
                  @endif

                  @yield('conteudo')
                </div>
                <div class="col-md-1"></div>
            </div>
        </div>

    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
    </body>
</html>