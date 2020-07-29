<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Rennokki\Larafy\Larafy;

class SpotifyController extends Controller
{
    public $artista;
    public $artistaOld;
    public $nomeArtista;
    public $imagem;
    public $seguidores;
    public $idArtist;
    public $retorno = "Pesquise um artista";
    public $resultadoStatus;
    public $spotifyUrl;

    public function index()
    {
        $api = new Larafy();

        try {
            $result = $api->getArtist("00FQb4jTyendYWaN8pK0wa");
        } catch(\Rennokki\Larafy\Exceptions\SpotifyAuthorizationException $e) {
            // invalid ID & Secret provided
            $e->getAPIResponse(); // Get the JSON API response.
        }
      

        dd($result);
        
    }
}
