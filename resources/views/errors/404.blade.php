<?php $layout = 'layouts_site.internas'; ?>
@if(Auth::user())
	<?php $layout = 'layouts.site'; ?>
<!--     @if(Auth::user()->role == 'ngo')
        <?php $layout = 'layouts.site'; ?>
    @elseif(Auth::user()->role == 'company')
        <?php $layout = 'layouts_site.internas'; ?>
    @endif -->
@endif
@extends($layout)


@section('titulo','ERRO - 404')

@section('conteudo')
<strong>A página não foi encontrada!</strong>
@endsection

