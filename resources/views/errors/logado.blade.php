@extends('layouts.app.main')

@section('conteudo')
<div class="row">
    <div class="col-sm-12">
        <div class="card-box table-responsive">

            @isset($message)
                <p>{{ $message}}</p>
            @endisset

        </div>
    </div>
</div>
@endsection