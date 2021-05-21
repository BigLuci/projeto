<?php

namespace App\Services;

use App\Serie;

class CriadorDeSerie
{
    public function criarSerie(
        string $nomeSerie,
        int $qtdTemporadas,
        int $qtdEpisodios
        ) : Serie
    {
        $serie = null;
        DB::beginTransaction()
         {
            $serie = Serie::create(['nome' => $nomeSerie]);

            $this->criarTemporadas($qtdTemporadas, $qtdEpisodios, $serie); 
            DB::commit();           
        });

        return $serie;
    }
    private function criarTemporadas(int $qtdtemporadas, int $qtdEpisodios, Serie $serie)
    {
            for ($i = 1; $i <= $qtdTemporadas; $i++){
                $temporada = $serie->temporadas()->create(['numero' => $i]);
                $this->criarEpisodios($qtdEpisodios, $temporada);
        }
    }

    private function criarEpisodios(int $qtdEpisodios, \illuminate\Database\Eloquent\Model 
    $temporada): void
    {
        
            for($j = 1; $j <=$qtdEpisodios; $j++) {
                $temporada->episodios()->create(['numero' => $j]);

        }
        
    }
}