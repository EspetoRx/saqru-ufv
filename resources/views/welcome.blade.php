<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        @csrf

        <title>Sistema de Avaliação da Qualidade de Serviço do R.U.</title>

        <link rel="stylesheet" href="{{asset('/css/app.css')}}">
        <link rel="stylesheet" href="{{asset('/css/style.css')}}">
        <link rel="shortcut icon" href="{{asset('images/logo_ufv.ico')}}" type="image/x-icon"/>
    </head>
    <body>
        <div class="se-pre-con">
            <div class="row" style="margin-top:100px;">
                <div class="col-md-12 text-center"><h4>Sistema de Avaliação da Qualidade de Serviço<br>do Restaurante Universitário</h4></div>
                <div class="loader"></div>
            </div>
        </div>
        <div class="container">
            <nav class="navbar navbar-expand-lg navbar-light bg-light navbar-style">
            <a class="navbar-brand" href="/"><img src="{{asset('/images/logo_ufv.png')}}" class="logo_ufv" alt="Ir para a Página Inicial"> SAQS R. U.</a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                      
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav ml-auto">
                        <li class="nav-item active">
                            <a class="nav-link" href="/"><i class="fas fa-home"></i> Página principal <span class="sr-only">(current)</span></a>
                        </li>
                        <li class="nav-item">
                            @if (Route::has('login'))
                                <div class="top-right links">
                                    @auth
                                        <a href="{{ url('/home') }}" class="nav-link btn btn-first">Acessar o Sistema <i class="fas fa-hand-point-right"></i></a>
                                    @else
                                        <a href="{{ route('login') }}" class="nav-link btn btn-first">Entrar <i class="fas fa-sign-in-alt"></i></a>
                                        {{--<a href="{{ route('register') }}">Registro</a>--}}
                                    @endauth
                                </div>
                            @endif
                        </li>
                    </ul>
                </div>
            </nav>
            <div class="row">
                <article class="col-md-8">
                    <h2 class="text-center">Relatório de resultados</h2>
                    <div class="row">
                        <div class="col-md-6">
                            <label for="data_grafico">Data: </label>
                            <input type="date" class="form-control" id="data_rel" value="{{Carbon\Carbon::now()->format('Y-m-d')}}" onchange="ajaxvotacao()">
                        </div>
                        <div class="col-md-6">
                            <label for="refeicao">Refeição</label>
                            <select name="refeicao" id="refeicao" class="form-control" onchange="ajaxvotacao()">
                                <option value="1">Café da Manhã</option>
                                <option value="2">Almoço</option>
                                <option value="3">Jantar</option>
                            </select>
                        </div>
                    </div>
                    <div id="mensagem_grafico" class="carregando">
                        <div class="row">
                            <div class="col-md-12 text-center" style="margin-top: 40px;">
                                <h3>Carregando informações de votações.</h3>
                                <div class="loader"></div>
                            </div>
                        </div>
                    </div>
                    <canvas id="graficos" width="100%" height="55%"></canvas>
                    <div id="graficos2"></div>
                </article>
                <aside class="col-md-4 margin-top-small">
                    <h2 class="text-center">Cardápio</h2>
                    <label for="data_cardapio">Escolha uma data:</label>
                    <input type="date" class="form-control" id="data_cardapio" value="{{Carbon\Carbon::now()->format('Y-m-d')}}" min="{{Carbon\Carbon::now()->format('Y-m-d')}}" onchange="ajaxcardapio()">
                    <div id="mensagem_cardapio" class="carregando">
                            <div class="row">
                                <div class="col-md-12 text-center" style="margin-top: 40px;">
                                    <h3>Carregando informações de votações.</h3>
                                    <div class="loader"></div>
                                </div>
                            </div>
                        </div>
                    <div id='include_cardapio'></div>
                </aside>
            </div>
            <footer class="text-center">
                Copyright &copy; Lucas Carvalho & Camila Guimarães - {{date('Y')}} - 
                <a class="contato" href="mailto:lcdo2395@gmail.com"><i class="fas fa-envelope"></i> Contato</a>
            </footer>
        </div>
        <script src="{{asset('/js/app.js')}}"></script>
        <script src="{{asset('/js/myscript.js')}}"></script>
    </body>
</html>
