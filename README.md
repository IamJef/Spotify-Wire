# O que é Spotify Wire? 

SpotifyWire é uma SPA que possibilita a pesquisa de artistas/bandas que estão no spotify.

# Funcionalidades
1 - Pesquisar artistas/bandas (sem refresh)<br/>
2 - Opção de salvar nos favoritos<br/>
3 - Ao retorna a pesquisa retorna os dados do artista/banda com imagem, nome e número de seguidores<br/>
4 - Botão com link para o usuario dentro do spotify <br/>
5 - Caso o usuário não tenha imagem criei uma imagem "própria" para exibir (O api retorna erro se tentar buscar a foto do usuário e ele não possuir)
# Como usar? :confused:	

1 - Clone esse repositório <br/>
2 - Rode "composer update" <br/>
3 - Rode "PHP artisan serve" <br/>
4 - Abra a url "localhost:8000" (caso esteja a porta padrão do Laravel)

# O que faltou?

1 - Remover dos favoritos <br />
2 - Pagina com informações sobre o artista/banda dentro do próprio SPA

# Bibliotecas usadas :blue_heart:
Larafy - https://github.com/rennokki/larafy (API Spotify) <br/>
LiveWire - https://laravel-livewire.com/  (Para evitar o refresh no laravel)
