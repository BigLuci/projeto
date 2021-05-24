<?php

namespace App\Services;

use App\Serie;
use App\Temporada;
use Illuminate\Support\Facades\DB;

class CriadorDeSerie
{
    public function criarSerie(
        string $nomeSerie,
        int $qtdTemporadas,
        int $qtdEpisodios
        ) : Serie
    {
        DB::beginTransaction();
         
            $serie = Serie::create(['nome' => $nomeSerie]);

            $this->criarTemporadas($qtdTemporadas, $qtdEpisodios, $serie); 
            DB::commit();    

            return $serie;
    }
    private function criarTemporadas(int $qtdtemporadas, int $qtdEpisodios, Serie $serie)
    {
            for ($i = 1; $i <= $qtdtemporadas; $i++){
                $temporada = $serie->temporadas()->create(['numero' => $i]);
                $this->criarEpisodios($qtdEpisodios, $temporada);
        }
    }

    private function criarEpisodios(int $qtdEpisodios, Temporada $temporada): void
    {
        
            for($j = 1; $j <=$qtdEpisodios; $j++) {
                $temporada->episodios()->create(['numero' => $j]);

        }
        
    }
}