@extends('layouts.app.main')

@section('titulo','ERRO')

@section('page-title','ERRO')

@section('breadcrumb')
<!--     <ol class="breadcrumb float-right">
        <li class="breadcrumb-item"><a href="#">ADMIN</a></li>
        <li class="breadcrumb-item active">Home</li>
    </ol> -->
@endsection

@section('conteudo')

<div class="row">
    <div class="col-12">
    	<div class="card-box">

            @isset($message)
                <p>{{ $message}}</p>
            @endisset

    	</div>
    </div>
</div>

@endsection