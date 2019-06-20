@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header text-center"><a href="/home" class="btn btn-sm btn-first float-left"><i class="fas fa-long-arrow-alt-left"></i>  Voltar</a><b>Gerenciar Votação</b></div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    <form action="/votacao" method="POST" target="_blank">
                    <div class="row text-center">
                        @csrf
                        <div class="col-md-4">
                            <label for="dia">Dia</label>
                            <input type="date" class="form-control" id="dia" name="dia" value="{{Carbon\Carbon::now()->format('Y-m-d')}}" min="{{Carbon\Carbon::now()->format('Y-m-d')}}" required>
                        </div>
                        <div class="col-md-4 margin-top-small">
                            <label for="refeicao">Refeição</label>
                            <select name="refeicao" id="refeicao" class="form-control" required>
                                @foreach (App\TipoRefeicao::all() as $i)
                                    <option value="{{$i->id}}">{{$i->descricao}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-md-4 margin-top-small">
                            <button type="submit" class="btn btn-first"><i class="fas fa-play"></i><br>Iniciar Votação</button>
                        </div>
                        
                    </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
