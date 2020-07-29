<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>SpotifyWire</title>
    {{-- fontawesome para ter alguns icones --}}
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css" rel="stylesheet">
    {{-- Arquivo css onde ficará o estilo da minha página --}}
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    {{-- Uma font bonita --}}
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@500&display=swap" rel="stylesheet">
    {{-- Bootstrap para usar GRID --}}

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
    @livewireStyles
</head>
<body>
    @yield('conteudo')
    {{  Cache::pull('favArtist') }}
    @livewireScripts
    <script>
    function setCookie(name,value,days) {
        var expires = "";
        if (days) {
            var date = new Date();
            date.setTime(date.getTime() + (days*24*60*60*1000));
            expires = "; expires=" + date.toUTCString();
        }
        document.cookie = name + "=" + (value || "")  + expires + "; path=/";
    }
    function removeDuplicates(array) {
        var uniqueArray = [];
        
        // Loop through array values
        for(var value of array){
            if(uniqueArray.indexOf(value) === -1){
                uniqueArray.push(value);
            }
        }
        return uniqueArray;
    };

    function salvarPessoa(id, nome, elemento, box){
    //Mensagem não existe favoritos
    var msgErro = document.getElementById("#nenhum-fav");

    if(msgErro != null) msgErro.style.display = 'none';

    // Pega a lista já cadastrada, se não houver vira um array vazio
    var lista_artista= JSON.parse(localStorage.getItem('lista_artista') || '[]');
    // Adiciona pessoa ao cadastro
    lista_artista.push({
        id: id,
        nome: nome
    });
    console.log(box);
    var boxFavs = document.querySelector('#favs-content');
    // Alterando a estrela de favoritos
    var el = document.getElementById(elemento);
    
    el.setAttribute( "onClick", "javascript: RemoverPessoa();" )
    el.innerHTML = '<i class="fa fa-star fa-2x" aria-hidden="true" style="color: yellow"></i>';


    // Clonando a caixa
    box = box.parentElement
    box = box.parentElement

    var clone = box.cloneNode(true)
    boxFavs.appendChild(clone);
   


    const arr = removeDuplicates(lista_artista);

    // Salva a lista alterada
    localStorage.setItem("lista_artista", JSON.stringify(arr));

    var favs = localStorage.getItem('lista_artista');
    setCookie('favoritosArt', favs, 7);


}
    </script>
</body>
</html>