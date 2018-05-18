@extends('layouts.site')

@section('titulo','ERRO - 403')
@section('conteudo')
<div class="row">
    <div class="col-sm-12">
        <div class="card-box table-responsive">
            {{ $exception->getMessage() }}
            @isset($msg)
            	<br>
                <p>{{ $msg }}</p>
            @endisset

        </div>
    </div>
</div>
@endsection

