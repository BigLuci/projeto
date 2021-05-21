<?php

namespace App\Services;

use App\Episodio;
use App\Serie;
use App\Temporada;
use Illuminate\Support\Facades\DB;

class RemovedorDeSerie 
{
    public function removerSerie(int $serieId):  string
    {
        $nomeSerie=''; 
        DB::transaction(function () use ($serieId, &$nomeSerie) {
            $serie = Serie::find($serieId);
            $nomeSerie = $serie->nome;
            $serie->delete();
            
            $this->removerTemporada($serie);

        });
        return redirect()->to('listar_series');
    }

    private function removerTemporada(Serie $serie): void
    {
        $serie->temporadas->each(function (Temporada $temporada) {
           
            $this->removerEpisodio($temporada);
            $temporada->delete();
        });
        
    }
    
    private function removerEpisodio(Temporada $temporada):void
    {
        $temporada->episodios->each(function (Episodio $episodio) {
            $episodio->delete();
        });
    }
    

}