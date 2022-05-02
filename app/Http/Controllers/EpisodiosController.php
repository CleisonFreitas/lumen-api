<?php

namespace App\Http\Controllers;

use App\Models\Episodio;

class EpisodiosController extends BaseController
{
    public function __construct()
    {
        $this->classe = Episodio::class;
    }

    public function buscaPorSerie(int $id)
    {
        $episodios = Episodio::Where('serie_id', $id)->paginate();

        return $episodios;
    }

    public function buscaPorEpisodio(int $id)
    {
        $episodios = Episodio::Where('id',$id)->paginate();

        return $episodios;
    }
}
