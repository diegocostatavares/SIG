@include('layouts_site._includes.header_start')



@include('layouts_site._includes.header_end')
 <!-- Header -->
      <header class="main-header">
         <div class="container">
            <div class="header-content">
               <a href="index.html">
                  <img src="{{asset('site/img/logo.png')}}" alt="site identity" />
               </a>


            </div>
         </div>
      </header>


<div class="content-box">
    <!-- Hero Section -->
    <section class="section section-hero">
        <div class="hero-box">
            <div class="container">
                <div class="hero-text align-center">
                    <h1>BONITO</h1>
                    <p>Como você nunca viu</p>
                </div>


            </div>
        </div>

        @include('layouts_site._includes.menu')

    </section>


    <section class="section section-destination">


        <!-- conteúdo  -->
        @yield('conteudo')

    </section>

    <!-- Parallax Box fixo -->
    <div class="parallax-box">
        <div class="container">
            <div class="text align-center">
                <h1>VENHA CONHEÇER BONITO</h1>
                <p>e descubra como a natureza foi generosa come este lugar.</p>
                <a href="{{route('site.contato')}}" class="btn btn-special no-icon size-2x">ENTRAR EM CONTATO</a>
            </div>
        </div>
    </div>

@include('layouts_site._includes.destaques_rodape')
</div>


@include('layouts_site._includes.footer_start')




@include('layouts_site._includes.footer_end')

