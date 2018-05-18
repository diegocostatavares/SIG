@extends('layouts.site')

@section('titulo','Destaques')
@section('conteudo')
<h4 class="page-title"><b>DESTAQUES - EDIÇÃO</b></h4>
<div class="row">
    <div class="col-sm-12">
        <div class="card-box table-responsive">

            <form class="" action="{{route('admin.conteudo.destaques.salvar') }}" method="post" enctype="multipart/form-data">
                {{ csrf_field() }}
                <input type="hidden" name="id" value="{{$registro->id}}">
                @include('admin.conteudo._form_destaques')
                <hr>
                <button class="btn btn-success waves-effect waves-light">Salvar</button>
            </form>

        </div>

    </div>

</div>




@endsection

