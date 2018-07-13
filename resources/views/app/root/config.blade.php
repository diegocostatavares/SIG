@extends('layouts.app.main')

@section('titulo','ROOT')

@section('page-title','ROOT')

@section('breadcrumb')
<!--     <ol class="breadcrumb float-right">
        <li class="breadcrumb-item"><a href="#">ROOT</a></li>
        <li class="breadcrumb-item active">Configurações</li>
    </ol> -->
@endsection

@section('conteudo')

<div class="row">
    <div class="col-12">

    	<div class="card-box">

			<h4 class="header-title m-t-0">Bem Vindo! ... Você é um usuário ROOT.<br><strong>{{Auth::user()->name}}</strong></h4>

		    @isset($msg)
		        <p>{{ $msg }}</p>
		        <hr>
		    @endisset

			<center>

			<a href="{{ route('root.clearCacheRoutes') }}" class="btn btn-danger btn-lg btn-block active" role="button" aria-pressed="true">Excluir Cache de Rotas</a>

			<a href="{{ route('root.clearCacheAll') }}" class="btn btn-danger btn-lg btn-block active" role="button" aria-pressed="true">Excluir TODOS Cache</a>

			</center>

    	</div>
    </div>
</div>

@endsection
