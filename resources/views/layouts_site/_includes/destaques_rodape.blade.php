<!-- Boats Section -->
<section class="section section-boats">
    <!-- Title -->
    <div class="section-title">
        <div class="container">
            <h2 class="title">Aconchego e conforto</h2>
            <p class="sub-title">Conheça nosso hotel e veja o que podemos lhe proporcionar</p>
        </div>
    </div>

    <!-- Content -->
    <div class="container">
        <div class="row">
            @foreach($destaque_secundario as $linha)
            <div class="col-sm-6 col-xs-24">
                <div class="boat-box">
                    <div class="box-cover">
                        <a href="{{$linha->link}}">
                            <img src="{{asset($linha->imagem)}}" alt="destination image" style="max-width: 558px; max-height: 325px" />
                        </a>
                    </div>
                    <div class="box-details">
                        <div class="box-meta">
                            <h4 class="boat-name">{!!$linha->titulo!!}</h4>

                        </div>
                    </div>
                </div>
            </div>
            @endforeach

        </div>
    </div>

    <div class="align-center">
        <a href="#" class="btn btn-default btn-load-boats"><span class="text">Veja mais</span><i class="icon-spinner6"></i></a>
    </div>
</div>
</section>