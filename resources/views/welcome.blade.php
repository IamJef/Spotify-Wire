@extends('template.template')
@section('conteudo')
<div class="bg"></div>
    <div class="row col-12 justify-content-center m-0 p-0">
        <span class="titulo branco">
            Spotify
        </span> 
        <span class="titulo verde">
            Wire
        </span>
    </div>
    @livewire('artist')

@endsection