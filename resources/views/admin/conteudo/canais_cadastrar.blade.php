@extends('layouts.site')

@section('titulo','Canais')
@section('conteudo')
<h4 class="page-title"><b>CANAIS - CADASTRO</b></h4>
<div class="row">
    <div class="col-sm-12">
        <div class="card-box table-responsive">

            <form class="" action="{{route('admin.conteudo.canais.salvar') }}" method="post" enctype="multipart/form-data">
                {{ csrf_field() }}
                @include('admin.conteudo._form_canais')
                <hr>
                <button class="btn btn-success waves-effect waves-light">Salvar</button>
            </form>

        </div>

    </div>

</div>




@endsection

