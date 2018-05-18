@extends('layouts_site.site')

@section('titulo','Hotel Caranda Eco Ville')


@section('conteudo')
<!-- Destinations Section -->
<section class="section section-destination">
    <!-- Title -->
    <div class="section-title">
        <div class="container">
            <h2 class="title">Explore os principais passeios</h2>
            <p class="sub-title">Conheça os principais passeios em Bonito e planeje suas férias.</p>
        </div>
    </div>

    <!-- Content -->
    <div class="container">
        <div class="row">

            <!-- DESTAQUE PRINCIPAL FULL -->
            <div class="col-md-16 col-xs-24">
                <div class="destination-box">
                    <div class="box-cover">
                        <a href="{{$destaque_principal_full->link}}">
                            <img src="{{asset($destaque_principal_full->imagem)}}" alt="destination image" style="max-width: 743px; max-height: 347px" />
                        </a>
                    </div>
                    <div class="box-details">
                        <div class="box-meta">
                            <h4 class="city">{{$destaque_principal_full->titulo}}</h4>
                            <p class="country">{!!$destaque_principal_full->texto!!}</p>
                        </div>
                    </div>
                </div>
            </div>
            <!-- DESTAQUE PRINCIPAL FULL -->

            
            <!-- DESTAQUE PRINCIPAL SINGLE -->
            @foreach($destaque_principal_single as $linha)
            <div class="col-md-4 col-sm-12 col-xs-24">
                <div class="destination-box">
                    <div class="box-cover">
                        <a href="{{$linha->link}}">
                            <img src="{{asset($linha->imagem)}}" alt="destination image"  style="max-width: 367px; max-height: 347px"/>
                        </a>
                    </div>
                    <div class="box-details">
                        <div class="box-meta">
                            <h4 class="city">{{$linha->titulo}}</h4>
                            <p class="country">{!!$linha->texto!!}</p>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
            
            <!-- DESTAQUE PRINCIPAL SINGLE -->

        </div>
    </div>

    <div class="align-center">
        <a href="#" class="btn btn-default btn-load-destination"><span class="text">Descubra mais passeios</span><i class="icon-spinner6"></i></a>
    </div>
</div>
</section>
@endsection