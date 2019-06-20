@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header text-center"><a href="/home"><button type="button" class="btn btn-first btn-sm float-left"><i class="fas fa-long-arrow-alt-left"></i>  Voltar</button></a><b>Gerenciar Cardápios</b></div>

                <div class="card-body">
                    <div class="row text-center">
                        <div class="col-md-12">
                            <a href="/cardapio/create"><button type="button" class="btn btn-first"><i class="fas fa-plus"></i> Adicionar Cardápio</button></a>
                        </div>
                        <div class="col-md-12 table-responsive table-margin">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <td>Data</td>
                                        <td>Tipo</td>
                                        <td>Descrição</td>
                                        <td>Ações</td>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($refeicoes as $r)
                                        <tr>
                                            <td>{{Carbon\Carbon::createFromFormat('Y-m-d', $r->dia)->format('d/m')}}</td>
                                            <td>{{App\TipoRefeicao::find($r->tipo_refeicao)->descricao}}</td>
                                            <td>
                                                @php
                                                    $cardapio_aux = nl2br($r->cardapio);
                                                @endphp
                                                {!!$cardapio_aux!!}
                                            </td>
                                        <td><a href="/cardapio/{{$r->id}}/edit" class="btn btn-sm btn-warning"><i class="fas fa-pencil-alt"></i> Editar</a> <a href="/cardapio/{{$r->id}}" class="btn btn-sm btn-danger"><i class="far fa-trash-alt"></i> Excluir</a></td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                            <div class="pagination-eita">
                                {{$refeicoes->links()}}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
