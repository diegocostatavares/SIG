@extends('layouts_site.internas')

@section('titulo','Hotel Caranda Eco Ville')


@section('conteudo')

        
 <h2 class="title">{{$linhas->nome}}</h2>
 {!!$linhas->texto !!}

@endsection