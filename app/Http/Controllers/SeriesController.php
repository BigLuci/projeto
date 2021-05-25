<?php

namespace App\Http\Controllers;

use App\Episodio;
use App\Http\Requests\SeriesFormRequest;
use App\Serie;
use App\Services\CriadorDeSerie;
use App\Services\RemovedorDeSerie;
use App\Temporada;
use Illuminate\Foundation\Testing\Constraints\SoftDeletedInDatabase;
use Illuminate\Http\Request;

class SeriesController extends Controller{
    
    public function index (Request $request) {

        $series = Serie::query()
            ->orderBy('nome')
            ->get();
        
        /**mostra atributos,rotas, pastas e em funcões laravel */
        // dd($series);
        /**mostra as mesmas coisas em php */
        // var_dump($series);
        // exit();
        $mensagem = $request->session()->get('mensagem');
        // $request->session()->remove('mensagem');
     

        return view('series.index', [
            'series' => $series, 'mensagem'=> $mensagem
        ]);
    }

    public function create()
    {
        return view('series.create');
    }

    public function store(
        SeriesFormRequest $request,
        CriadorDeSerie $criadorDeSerie)
    {

        $serie = $criadorDeSerie->criarSerie(
            $request->nome,
            $request->qtd_temporadas,
            $request->qtd_episodios
        );
        /**$nome = $request ->get('nome'); 
        *$serie = Serie::create([
        *    'nome' => $nome
        *]);
        *sintaxe do laravel 
        *$nome = $request ->nome; */

        $request->session()->flash('mensagem',
         "Serie {$serie->id} criada com sucesso
          {$serie->nome}"
        );
        
        /**Exibir serie criada com id */
        // echo "Série com id {$serie->id} criada: {$serie->nome}";
        return redirect()->route('listar_series');

      /**   $serie = new Serie();
        * $serie->nome = $nome;
        * var_dump($serie->save()); 
        */
    }

    public function destroy(Request $request, RemovedorDeSerie $removedorDeSerie) 
    {
       $nomeSerie = $removedorDeSerie->removerSerie($request->id);
        $request->session()
            ->flash(
                'mensagem',
                "Serie removida com sucesso"
        );
        return redirect()->route('listar_series');
    }

    public function editaNome(Request $request) {

        $novoNome = $request->nome;
        $serie = Serie::Find($request->id);
        $serie->nome = $novoNome;
        $serie->save();

    }

}