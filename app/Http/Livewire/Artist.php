<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Rennokki\Larafy\Larafy;
use Illuminate\Support\Facades\Cache;


class Artist extends Component
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
    public $fav = 0;
    public $favoritos;
    public $retornoFav;
    public $imagemFav;
    public $seguidoresFav;
    public $urlFav;

    public function mount()
    {
        $this->imagemFav = [];
        $this->seguidoresFav = [];
        $this->retornoFav = [];
        $this->urlFav = [];

        $api = new Larafy();

        if(isset($_COOKIE['favoritosArt'])) {
            $this->favoritos = $_COOKIE['favoritosArt'];
            $this->favoritos = json_decode($this->favoritos, true);

            foreach($this->favoritos as $res){
                try {
                    $result = $api->getArtist($res["id"]);
                    $this->retornoFav[] = $result;
                    if(isset($result->images[0]->url)) $this->imagemFav[] = $result->images[0]->url;
                    $this->seguidoresFav[] = $result->followers->total;
                    $this->urlFav[] = $result->external_urls->spotify;

                } catch(\Rennokki\Larafy\Exceptions\SpotifyAuthorizationException $e) {
                    $e->getAPIResponse();
                }
            }
        }   
       
       
    }
    public function submit()
    {
        $api = new Larafy();
        if($this->artista){
            $this->artistaOld = $this->artista;
        }
        
        if($this->artistaOld == ""){
            $this->resultadoStatus = false;
            $this->retorno = "Digite o nome de um artista.";
        }else{
            try {
                $result = $api->searchArtists($this->artistaOld);

                if(count($result->items) <= 0)
                {
                    $this->resultadoStatus = false;
                    $this->retorno = "Nenhum artista encontrado.";
                }else{
                    $this->nomeArtista    = [];
                    $this->imagem         = [];
                    $this->seguidores     = [];
                    $this->idArtist       = [];
                    $this->spotifyUrl     = [];

                    foreach($result->items as $artista)
                    {
                        $this->nomeArtista[]    = $artista->name;
                        if(isset($artista->images[0]->url)) $this->imagem[] = $artista->images[0]->url;
                        $this->seguidores[]     = $artista->followers->total;
                        $this->idArtist[]       = $artista->id;
                        $this->spotifyUrl[]     = $artista->external_urls->spotify;
                    }
                    $this->resultadoStatus = true;
                    $this->retorno = count($result->items)." resultados encontrados.";
                }
              
            } catch(\Rennokki\Larafy\Exceptions\SpotifyAuthorizationException $e) {
                $e->getAPIResponse();
                $this->retorno = "API KEY inválido";
            }
        }

        $this->imagemFav = [];
        $this->seguidoresFav = [];
        $this->retornoFav = [];
        $this->urlFav = [];

        $api2 = new Larafy();

        if(isset($_COOKIE['favoritosArt'])) {
            $this->favoritos = $_COOKIE['favoritosArt'];
            $this->favoritos = json_decode($this->favoritos, true);

            foreach($this->favoritos as $res){
                try {
                    $result = $api2->getArtist($res["id"]);
                    $this->retornoFav[] = $result;
                    if(isset($result->images[0]->url)) $this->imagemFav[] = $result->images[0]->url;
                    $this->seguidoresFav[] = $result->followers->total;
                    $this->urlFav[] = $result->external_urls->spotify;

                } catch(\Rennokki\Larafy\Exceptions\SpotifyAuthorizationException $e) {
                    $e->getAPIResponse();
                }
            }
        }  
        
    }

    public function addFav(Request $req, $id, $name)
    {
        $favAtual = Cookie::get('favArtist');

        if(!empty($favAtual))
        {
            $fav[] = $favAtual;
        }

        array_push($fav, $id);

        $json = serialize($fav);

        cookie('favArtist', $json, 9000);
    }
    public function remFav($id)
    {
        Cache::forget($id);
    }
    public function render()
    {
        return view('livewire.artist');
    }
}
