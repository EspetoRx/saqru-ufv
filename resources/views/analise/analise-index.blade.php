@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header text-center"><a href="/home"><button type="button" class="btn btn-first btn-sm float-left"><i class="fas fa-long-arrow-alt-left"></i>  Voltar</button></a><b>Análise Completa</b></div>

                <div class="card-body">
                    <div class="row text-center">
                        <div class="col-md-12">
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
                                <canvas id="graficoSabor" width="100%" height="55%" style="margin-top: 10px;"></canvas>
                                <canvas id="graficoCardapio" width="100%" height="55%" style="margin-top: 10px;"></canvas>
                                <canvas id="graficoHigiene" width="100%" height="55%" style="margin-top: 10px;"></canvas>
                                <canvas id="graficoAmbiente" width="100%" height="55%" style="margin-top: 10px;"></canvas>
                                <div id="graficos"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
