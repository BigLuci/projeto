<?php

namespace App\Http\Controllers;

use App\Serie;
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

    public function store(Request $request)
    {
        /**$nome = $request ->get('nome'); 
        *$serie = Serie::create([
        *    'nome' => $nome
        *]);
        *sintaxe do laravel 
        *$nome = $request ->nome; */
        $serie = Serie::create($request->all());

        $request->session()->flash('mensagem',
         "Serie {$serie->id} criada com sucesso
          {$serie->nome}"
        );
        
        /**Exibir serie criada com id */
        // echo "Série com id {$serie->id} criada: {$serie->nome}";
        return redirect('/series');

      /**   $serie = new Serie();
        * $serie->nome = $nome;
        * var_dump($serie->save()); 
        */
    }

    public function destroy(Request $request) 
    {
        Serie::destroy($request->id);
        $request->session()
            ->flash(
                'mensagem',
                "Serie removida com sucesso"
        );
        return redirect('/series');
    }

}