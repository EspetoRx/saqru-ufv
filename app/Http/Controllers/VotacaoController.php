<?php

namespace App\Http\Controllers;

use App\Votacao;
use App\Refeicao;
use Illuminate\Http\Request;

class VotacaoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        return view('votacao.votacao-index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $refeicao = Refeicao::where('dia', $request->dia)->where('tipo_refeicao', $request->refeicao)->first();
        if($refeicao == null){
            $refeicao = new Refeicao();
            $refeicao->tipo_refeicao = $request->refeicao;
            $refeicao->cardapio = "Cardápio vazio... =(";
            $refeicao->dia = $request->dia;
            $refeicao->save();
        }
        $refeicaoEx = Votacao::where("refeicao", $refeicao->id)->first();
        if($refeicaoEx != null){
            $votacao = $refeicaoEx;
        }else{
            $votacao = new Votacao();
            $votacao->refeicao = $refeicao->id;
            $votacao->save();
        }
        $id = $votacao->id;
        return view('votacao.votacao-coleta', compact('id'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Votacao  $votacao
     * @return \Illuminate\Http\Response
     */
    public function show(Votacao $votacao)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Votacao  $votacao
     * @return \Illuminate\Http\Response
     */
    public function edit(Votacao $votacao)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Votacao  $votacao
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $votacao)
    {
        //
        $encontrado = Votacao::find($votacao);
        if($request->sa == 1){
            $encontrado->estrelaSabor1 += 1;
        }
        if($request->sa == 2){
            $encontrado->estrelaSabor2 += 1;
        }
        if($request->sa == 3){
            $encontrado->estrelaSabor3 += 1;
        }
        if($request->sa == 4){
            $encontrado->estrelaSabor4 += 1;
        }
        if($request->sa == 5){
            $encontrado->estrelaSabor5 += 1;
        }
        if($request->hi == 1){
            $encontrado->estrelaHigiene1 += 1;
        }
        if($request->hi == 2){
            $encontrado->estrelaHigiene2 += 1;
        }
        if($request->hi == 3){
            $encontrado->estrelaHigiene3 += 1;
        }
        if($request->hi == 4){
            $encontrado->estrelaHigiene4 += 1;
        }
        if($request->hi == 5){
            $encontrado->estrelaHigiene5 += 1;
        }
        if($request->ca == 1){
            $encontrado->estrelaCardapio1 += 1;
        }
        if($request->ca == 2){
            $encontrado->estrelaCardapio2 += 1;
        }
        if($request->ca == 3){
            $encontrado->estrelaCardapio3 += 1;
        }
        if($request->ca == 4){
            $encontrado->estrelaCardapio4 += 1;
        }
        if($request->ca == 5){
            $encontrado->estrelaCardapio5 += 1;
        }
        if($request->am == 1){
            $encontrado->estrelaAmbiente1 += 1;
        }
        if($request->am == 2){
            $encontrado->estrelaAmbiente2 += 1;
        }
        if($request->am == 3){
            $encontrado->estrelaAmbiente3 += 1;
        }
        if($request->am == 4){
            $encontrado->estrelaAmbiente4 += 1;
        }
        if($request->am == 5){
            $encontrado->estrelaAmbiente5 += 1;
        }
        $encontrado->save();
        $val = true;
        $json = json_encode($val);
        return response()->json($val);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Votacao  $votacao
     * @return \Illuminate\Http\Response
     */
    public function destroy(Votacao $votacao)
    {
        //
    }

    public function start(){
        return view('votacao.votacao-coleta');
    }

    public static function retorna(Request $request){
        $encontrado = Refeicao::where('dia', $request->data)->where('tipo_refeicao', $request->refeicao)->first();
        if($encontrado == null){
            $val = 'null';
            $json = json_encode($val);
            return response()->json($val);
        }
        $votacao = Votacao::where('refeicao', $encontrado->id)->first();
        if($votacao == null){
            $val = 'null';
            $json = json_encode($val);
            return response()->json($val);
        }
        $val = $votacao;
        $json = json_encode($val);
        return response()->json($val);
    }
}
