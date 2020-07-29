<div>
    <form wire:submit.prevent="submit">
    <div class="row col-12 justify-content-center m-0 p-0">
            <input wire.ignore wire:model="artista" name="artista" placeholder="Pesquise um artista" class="pesquisar" type="text">
        <div wire:loading>
            <button disbled class="buscar-disabled ml-1">
                <img src="{{ asset('icone/pesquisar.svg')}}">
            </button>
        </div>
        <div wire:loading.remove>
            <button class="buscar ml-1">
                <img src="{{ asset('icone/pesquisar.svg')}}">
            </button>
        </div>
    </div>
    </form>

    <div class="row col-12 mt-4 justify-content-center text-white">
        <strong>
            {{ $retorno }}
        </strong>
    </div>
    <div class="row col-12 mt-3 justify-content-center">
   @if($resultadoStatus == true)
   
        @foreach($idArtist as $artista)
           
                <div class="box-artista">
                    <div class="foto-perfil" style="max-height: 250px;overflow:hidden">
                        @if(isset($imagem[$loop->index]))
                        <img src="{{ $imagem[$loop->index]}}" class="rounded" width="250">
                    @else 
                    <img src="{{ asset('imgs/sem-foto.png')}}" class="rounded" width="250">
                    @endif
                    </div>
                    <div class="textos-box">
                        <span class="nomeArtista text-center">
                            {{ $nomeArtista[$loop->index] }}
                        </span>
                        <br>
                        <span class="seguidores">
                            Seguidores: <strong>{{ number_format($seguidores[$loop->index], 0, "", ".") }}</strong> 
                        </span>
                        <br>
                        <center>
                            <a href="{{ $spotifyUrl[$loop->index] }}" target="_blank" >
                                <button class="ouvir">
                                   <i class="fa fa-spotify fa-2x" style="color:#fff" aria-hidden="true"></i>
                                </button>
                            </a>
                            {{-- {{ $idArtist[$loop->index] }} --}}
                           
                                {{-- <button class="favoritar" wire:click="addFav('{{ $idArtist[$loop->index] }}', '{{ $nomeArtista[$loop->index] }}')">
                                    <i class="fa fa-star-o fa-2x" aria-hidden="true"></i>
                                </button> --}}

                                <button class="favoritar" onclick="salvarPessoa('{{ $idArtist[$loop->index] }}', '{{ $nomeArtista[$loop->index] }}', this.id, this.parentElement)" id="{{ $idArtist[$loop->index] }}">
                                    <i class="fa fa-star-o fa-2x" aria-hidden="true"></i>
                                </button>
                        </center>
                    
                    </div>
                </div>
        @endforeach
   @endif
</div>

   
        <div class="row col-12 lista-favoritos justify-content-center">
            <strong>Lista de Favoritos</strong>
        </div>
        <div class="row col-12 lista-favoritos justify-content-center"  id="favs-content">
            @if(!empty($_COOKIE['favoritosArt'])) 
            @foreach($favoritos as $fav)
                    <div class="box-artista">
                        <div class="foto-perfil" style="max-height: 250px;overflow:hidden">
                            <img src="{{ $imagemFav[$loop->index]}}" class="rounded" width="250">
                        </div>
                <div class="textos-box">
                    <span class="nomeArtista text-center">
                        {{ $fav["nome"] }}
                    </span>
                    <br>
                    <span class="seguidores">
                        Seguidores: <strong>{{ number_format($seguidoresFav[$loop->index], 0, "", ".") }}</strong> 
                    </span>
                    <br>
                    <center>
                        <a href="{{ $urlFav[$loop->index] }}" target="_blank" >
                            <button class="ouvir">
                            <i class="fa fa-spotify fa-2x" style="color:#fff" aria-hidden="true"></i>
                            </button>
                        </a>
                        {{-- {{ $idArtist[$loop->index] }} --}}
                    
                            {{-- <button class="favoritar" wire:click="addFav('{{ $idArtist[$loop->index] }}', '{{ $nomeArtista[$loop->index] }}')">
                                <i class="fa fa-star-o fa-2x" aria-hidden="true"></i>
                            </button> --}}

                            <button class="favoritar" onclick="salvarPessoa('{{ $fav['id'] }}', '{{ $fav['nome'] }}')">
                                <i class="fa fa-star fa-2x" aria-hidden="true" style="color: yellow"></i>
                            </button>
                    </center>
                
                </div>
            </div>
            @endforeach
            @else 
                <span class="text-danger" id="nenhum-fav">Nenhum favorito encontrado.</span>
            @endif

        </div>
    
</div>
