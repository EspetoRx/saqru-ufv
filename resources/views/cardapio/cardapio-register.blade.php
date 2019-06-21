@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header text-center"><a href="/cardapio"><button type="button" class="btn btn-sm btn-first float-left"><i class="fas fa-long-arrow-alt-left"></i> Voltar</button></a><b>Adicionar Cardápios</b></div>

                <div class="card-body">
                    <form action="/cardapio" method="POST">
                        @csrf
                        <div class="row text-center">
                            <div class="offset-md-3 col-md-6">
                                <div class="form-group">
                                    <label for="data_cardapio">Data</label>
                                    <input type="date" class="form-control" name="dia" id="data_cardapio" value="{{Carbon\Carbon::now()->format('Y-m-d')}}" min="{{Carbon\Carbon::now()->format('Y-m-d')}}" required>
                                </div>
                            </div>
                        </div>
                        <div class="row text-center">
                            <div class="offset-md-3 col-md-6">
                                <div class="form-group">
                                    <label for="cafe">Café da Manha</label>
                                    <textarea name="cafe" id="cafe" rows="4" class="form-control" ></textarea>
                                </div>
                            </div>
                            <div class="offset-md-3 col-md-6">
                                <div class="form-group">
                                    <label for="almoco">Almoço</label>
                                    <textarea name="almoco" id="almoco" rows="4" class="form-control" ></textarea>
                                </div>
                            </div>
                            <div class="offset-md-3 col-md-6">
                                <div class="form-group">
                                    <label for="jantar">Jantar</label>
                                    <textarea name="jantar" id="jantar" rows="4" class="form-control" ></textarea>
                                </div>
                            </div>
                            <div class="offset-md-3 col-md-6 table-margin">
                                <div class="form-group">
                                    <button type="submit" class="btn btn-first"><i class="fas fa-plus"></i> Cadastrar Cardápio</button>
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
