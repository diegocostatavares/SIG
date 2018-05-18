@extends('layouts.site')

@section('titulo','Admin - Hotel Pousada Caranda')


@section('conteudo')

Bem Vindo!<br><strong>{{Auth::user()->name}}</strong>

@endsection