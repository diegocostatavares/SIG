@extends('layouts.site')

@section('titulo','ROOT')

@section('conteudo')

@if (session('msg'))
    <div class="alert alert-info">
        <strong>{{ session('msg') }}</strong>
    </div>
@endif

Bem Vindo! ... Você é um usuário ROOT.<br><strong>{{Auth::user()->name}}</strong>

<hr>

    @isset($msg)
        <p>{{ $msg }}</p>
        <hr>
    @endisset

<center>

<a href="{{ route('admin.root.clearCacheRoutes') }}" class="btn btn-danger btn-lg btn-block active" role="button" aria-pressed="true">Excluir Cache de Rotas</a>

<a href="{{ route('admin.root.clearCacheAll') }}" class="btn btn-danger btn-lg btn-block active" role="button" aria-pressed="true">Excluir TODOS Cache</a>

</center>

@endsection
