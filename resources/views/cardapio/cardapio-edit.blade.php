@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header text-center"><a href="/cardapio"><button type="button" class="btn btn-sm btn-first float-left"><i class="fas fa-long-arrow-alt-left"></i> Voltar</button></a><b>Editar Refeição</b></div>

                <div class="card-body">
                <form action="/cardapio/{{$refeicao->id}}" method="POST">
                        @csrf
                        @method('PATCH')
                        <div class="row text-center">
                            <div class="offset-md-3 col-md-6">
                                <div class="form-group">
                                    <label for="data_cardapio">Data</label>
                                    <input type="date" class="form-control" name="dia" id="data_cardapio" value="{{Carbon\Carbon::createFromFormat('Y-m-d', $refeicao->dia)->format('Y-m-d')}}" required readonly>
                                </div>
                            </div>
                        </div>
                        <div class="row text-center">
                            <div class="offset-md-3 col-md-6">
                                <div class="form-group">
                                    <label for="refeicao">{{$tipo}}</label>
                                <textarea name="refeicao" id="refeicao" rows="4" class="form-control" required>{!!$refeicao->cardapio!!}</textarea>
                                </div>
                            </div>
                            <div class="offset-md-3 col-md-6 table-margin">
                                <div class="form-group">
                                    <button type="submit" class="btn btn-first"><i class="fas fa-pencil-alt"></i> Editar Refeição</button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection