<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Sistema de Avaliação da Qualidade de Serviço do R.U.</title>

    <link rel="stylesheet" href="{{asset('/css/app.css')}}">
    <link rel="stylesheet" href="{{asset('/css/style.css')}}">

</head>
<body>
    <div class="container">
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light navbar-style">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}"><img src="{{asset('/images/logo_ufv.png')}}" class="logo_ufv" alt="Ir para a Página Inicial"></a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav mr-auto">

                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <button class="btn btn-sm btn-first" id="fechar_votacao"><i class="fas fa-times"></i> Fechar</button>
                    </ul>
                </div>
            </div>
        </nav>

        <main class="py-4">
            @yield('content')
        </main>
        <!-- Scripts -->
        <script src="{{ asset('js/app.js') }}" defer></script>
        <script src="{{ asset('js/myscript2.js') }}" defer></script>
    </div>
</div>
</body>
</html>
