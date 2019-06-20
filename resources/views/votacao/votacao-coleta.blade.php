@extends('layouts.app3')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header text-center"><b>Vote na Qualidade de Serviço do R.U.</b></div>
                <form action="votacao/{{$id}}" method="POST" id="votacao">
                @method('PATCH')
                @csrf
                <div class="card-body">
                    <div id="response"></div>
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <div class="row text-center">
                        <div class="col-md-12" id="resposta"></div>
                        <div class="col-md-6 form-group" id="sastar">
                            <label for="">Sabor do alimento</label><br/>
                            <label for="sa1" class="sastar1"><i class="fas fa-star"></i></label>
                            <input type="radio" name="sa" value="1" id="sa1" style="display:none" checked>
                            <label for="sa2" class="sastar2"><i class="fas fa-star"></i></label>
                            <input type="radio" name="sa" value="2" id="sa2" style="display:none">
                            <label for="sa3" class="sastar3"><i class="fas fa-star"></i></label>
                            <input type="radio" name="sa" value="3" id="sa3" style="display:none">
                            <label for="sa4" class="sastar4"><i class="fas fa-star"></i></label>
                            <input type="radio" name="sa" value="4" id="sa4" style="display:none">
                            <label for="sa5" class="sastar5"><i class="fas fa-star"></i></label>
                            <input type="radio" name="sa" value="5" id="sa5" style="display:none">
                        </div>
                        <div class="col-md-6 form-group">
                            <label for="">Cardápio</label><br>
                            <label for="ca1" class="castar1"><i class="fas fa-star"></i></label>
                            <input type="radio" name="ca" value="1" id="ca1" style="display:none" checked>
                            <label for="ca2" class="castar2"><i class="fas fa-star"></i></label>
                            <input type="radio" name="ca" value="2" id="ca2" style="display:none">
                            <label for="ca3" class="castar3"><i class="fas fa-star"></i></label>
                            <input type="radio" name="ca" value="3" id="ca3" style="display:none">
                            <label for="ca4" class="castar4"><i class="fas fa-star"></i></label>
                            <input type="radio" name="ca" value="4" id="ca4" style="display:none">
                            <label for="ca5" class="castar5"><i class="fas fa-star"></i></label>
                            <input type="radio" name="ca" value="5" id="ca5" style="display:none">
                        </div>
                        <div class="col-md-6 form-group">
                            <label for="">Higiene do local</label><br>
                            <label for="hi1" class="histar1"><i class="fas fa-star"></i></label>
                            <input type="radio" name="hi" value="1" id="hi1" style="display:none" checked>
                            <label for="hi2" class="histar2"><i class="fas fa-star"></i></label>
                            <input type="radio" name="hi" value="2" id="hi2" style="display:none">
                            <label for="hi3" class="histar3"><i class="fas fa-star"></i></label>
                            <input type="radio" name="hi" value="3" id="hi3" style="display:none">
                            <label for="hi4" class="histar4"><i class="fas fa-star"></i></label>
                            <input type="radio" name="hi" value="4" id="hi4" style="display:none">
                            <label for="hi5" class="histar5"><i class="fas fa-star"></i></label>
                            <input type="radio" name="hi" value="5" id="hi5" style="display:none">
                        </div>
                        <div class="col-md-6 form-group">
                            <label for="">Ambiente</label><br>
                            <label for="am1" class="amstar1"><i class="fas fa-star"></i></label>
                            <input type="radio" name="am" value="1" id="am1" style="display:none" checked>
                            <label for="am2" class="amstar2"><i class="fas fa-star"></i></label>
                            <input type="radio" name="am" value="2" id="am2" style="display:none">
                            <label for="am3" class="amstar3"><i class="fas fa-star"></i></label>
                            <input type="radio" name="am" value="3" id="am3" style="display:none">
                            <label for="am4" class="amstar4"><i class="fas fa-star"></i></label>
                            <input type="radio" name="am" value="4" id="am4" style="display:none">
                            <label for="am5" class="amstar5"><i class="fas fa-star"></i></label>
                            <input type="radio" name="am" value="5" id="am5" style="display:none">
                        </div>
                        <div class="col-md-12">
                            <br>
                            <button type="button" class="btn btn-success" onclick="ajaxvote()">Registrar Voto</button>
                        </div>
                    </div>
                </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
