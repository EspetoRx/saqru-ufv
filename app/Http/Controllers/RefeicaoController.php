<?php

namespace App\Http\Controllers;

use App\Refeicao;
use App\TipoRefeicao;
use Illuminate\Http\Request;
use Carbon\Carbon;

class RefeicaoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $refeicoes = Refeicao::orderBy('dia', 'desc')->paginate(3);
        return view('cardapio.cardapio-index', compact('refeicoes', 'aux'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('cardapio.cardapio-register');
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
        $validatedData = $request->validate([
            'dia' => 'required|date',
            'cafe' => 'required',
            'almoco' => 'required',
            'jantar' => 'required'
        ]);

        $resposta = Refeicao::where('dia', $request->dia)->get();
        if(!$resposta->isNotEmpty()){
            $cafe = new Refeicao();
            $almoco = new Refeicao();
            $jantar = new Refeicao();
        }else{
            $cafe = Refeicao::where('dia', $request->dia)->where('tipo_refeicao', 1)->first();
            $almoco = Refeicao::where('dia', $request->dia)->where('tipo_refeicao', 2)->first();
            $jantar = Refeicao::where('dia', $request->dia)->where('tipo_refeicao', 3)->first();
        }
        $cafe->tipo_refeicao = 1;
        $cafe->cardapio = $request->cafe;
        $cafe->dia = $request->dia;
        
        $almoco->tipo_refeicao = 2;
        $almoco->cardapio = $request->almoco;
        $almoco->dia = $request->dia;
        
        $jantar->tipo_refeicao = 3;
        $jantar->cardapio = $request->jantar;
        $jantar->dia = $request->dia;

        $cafe->save();
        $almoco->save();
        $jantar->save();

        return redirect('/cardapio');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Refeicao  $refeicao
     * @return \Illuminate\Http\Response
     */
    public function show($refeicao)
    {
        //
        $refeicao = Refeicao::find($refeicao);
        $tipo = TipoRefeicao::find($refeicao->tipo_refeicao)->descricao;
        return view('cardapio.cardapio-show', compact('refeicao', 'tipo'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Refeicao  $refeicao
     * @return \Illuminate\Http\Response
     */
    public function edit($refeicao)
    {
        //
        $refeicao = Refeicao::find($refeicao);
        $tipo = TipoRefeicao::find($refeicao->tipo_refeicao)->descricao;
        return view('cardapio.cardapio-edit', compact('refeicao', 'tipo'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Refeicao  $refeicao
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $refeicao)
    {
        //
        $refeicao = Refeicao::find($refeicao);
        $refeicao->cardapio = $request->refeicao;
        $refeicao->save();
        return redirect('/cardapio');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Refeicao  $refeicao
     * @return \Illuminate\Http\Response
     */
    public function destroy($refeicao)
    {
        //
        $refeicao = Refeicao::find($refeicao);
        $refeicao->delete();
        return redirect('/cardapio');
    }

    public static function retorna(Request $request){
        $refeicoes = Refeicao::where('dia', $request->day)->get();
        $json = json_encode($refeicoes);
        return response()->json($json);
    }
}
