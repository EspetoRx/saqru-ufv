@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header text-center"><b>Sistema de Avaliação da Qualidade de Serviço do R.U.</b></div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <div class="row text-center">
                        <div class="col-md-4">
                            <a href="/cardapio"><button type="button" class="btn btn-first margin-top-small"><i class="fas fa-utensils"></i><br>Gerenciar Cardápio</button></a>
                        </div>
                        <div class="col-md-4">
                            <a href="/analise"><button type="button" class="btn btn-first margin-top-small"><i class="far fa-chart-bar"></i><br>Analizar Dados</button></a>
                        </div>
                        <div class="col-md-4">
                            <a href="/votacao"><button type="button" class="btn btn-first margin-top-small"><i class="fas fa-star"></i><br>Gerenciar Votação</button></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
