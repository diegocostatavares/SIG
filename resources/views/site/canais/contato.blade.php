@extends('layouts_site.internas')

@section('titulo','Hotel Caranda Eco Ville')


@section('conteudo')
<h2 class="title">ENTRE EM CONTATO</h2>
<div class="row">

    <div class="col-sm-4">
        <div class="card-box table-responsive">

            <div>
                <h4>ONDE ESTAMOS</h4>
                Rua General Osório nº 850<br>
                Centro - Bonito • MS
            </div>
             <br>
            <div>
                <h4>ENTRE EM CONTATO</h4>
                <ul>
                    <li><a href="tel:6732553553" onclick="goog_report_conversion('tel:6732553553')">(67) 3255-3553</a></li>
                    <li><a href="tel:6732554540" onclick="goog_report_conversion('tel:6732554540')">(67) 3255-4540</a></li>
                    <li><a href="tel:6732554540" onclick="goog_report_conversion('tel:6732554679')">(67) 3255-4679</a></li>
                    <li><a href="tel:67993077444" onclick="goog_report_conversion('tel:67993077444')">(67) 99307-7444</a></li>
                    <li><a href="tel:67999015091" onclick="goog_report_conversion('tel:67999015091')">(67) 99901-5091</a></li>
                    <li><a href="tel:67999014066" onclick="goog_report_conversion('tel:679990-4066')">(67) 99901-4066</a></li>
                    <li><a href="tel:67999014080" onclick="goog_report_conversion('tel:67999014080')">(67) 99901-4080</a></li>
                </ul>
                TODOS OS DIAS DAS 07H ÀS 22H
            </div>
            <br>
            <div>
                <h4>COMO CHEGAR</h4>
                <ul>
                    <li><strong>Como chegar de Bonito a Ponta Porã (opção 1)</strong></li>
                    <li>Bonito&gt; Guia Lopes da Laguna &gt; Jardim &gt; Bela Vista &gt; Ponta Porã</li>
                    <li><strong>Como chegar de Bonito a Miranda - MS</strong></li>
                    <li>Bonito &gt; Bodoquena &gt; Miranda (uma parte do trecho é feita em estrada de terra)</li>
                    <li><strong>Como chegar de São Paulo - SP</strong></li>
                    <li>Escolha seu caminho até Presidente Prudente, depois &gt; Presidente Venceslau &gt; Presidente Epitácio &gt; MS Bataguassu &gt; Nova Alvorada do Sul &gt; Rio Brilhante &gt; Maracaju &gt; Guia Lopes da Laguna &gt; Bonito</li>
                    <li><strong>Como chegar de Dourados - MS</strong></li>
                    <li>Dourados &gt; Itaporã &gt; Maracaju &gt; Guia Lopes da Laguna &gt; Bonito</li>
                    <li><strong>Como chegar de Campo Grande - MS</strong></li>
                    <li>Campo Grande &gt; Sidrolândia &gt; Nioaque &gt; Guia Lopes da Laguna &gt; Bonito</li>
                </ul>
            </div>
        </div>
    </div>

    <div class="col-sm-7">
        <div class="card-box table-responsive">

            <p>Para você desfrutar das mais belas paisagens, no melhor destino ecoturístico do Brasil, a Pousada Carandá Ville , localizada a 200m do centro da cidade, 
                possui uma excelente estrutura, ambiente familiar, 
                decorada com sementes e cipós da região, deixando assim você integrado com nossa flora.</p>
            <p><strong>Deixe aqui seu contato que nós retornamos.</strong></p>

            <form class="" action="{{route('site.contato.envia') }}" method="post" enctype="multipart/form-data">
                {{ csrf_field() }}

                <fieldset class="form-group">
                    <label for="nome">Nome</label>
                    <input type="text" class="form-control" id="nome" name="nome" placeholder="Digite seu nome" >
                    </small>
                </fieldset>

                <fieldset class="form-group">
                    <label for="cidade">Cidade</label>
                    <input type="text" class="form-control" id="cidade" name="cidade" placeholder="De onde você virá?" >
                    </small>
                </fieldset>
                <fieldset class="form-group">
                    <label for="email">E-mail</label>
                    <input type="email" class="form-control" id="email" name="email" >
                    </small>
                </fieldset>

                <fieldset class="form-group">
                    <label for="telefone">Telefone</label>
                    <input type="tel" class="form-control" id="telefone" name="telefone" >
                    </small>
                </fieldset>

                <fieldset class="form-group">
                    <label for="mensagem">Mensagem</label>
                    <textarea class="form-control" id="texto" name="mensagem" rows="2"></textarea>
                    <small class="text-muted">Deixe aqui suas dúvidas, sugestões ou apenas mande um alô.
                    </small>
                </fieldset>

                <hr>
                <button class="btn btn-success waves-effect waves-light">Enviar</button>
            </form>

        </div>

    </div>

</div>




@endsection

