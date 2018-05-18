<fieldset class="form-group">
    <label for="nome">Nome</label>
    <input type="text" class="form-control" id="nome" name="nome" placeholder="Nome do Destaque..." value="{{isset($registro->nome) ? $registro->nome : ''}}">
    <small class="text-muted">Este será o título do Destaque, que é um link em seu site.
    </small>
</fieldset>

<fieldset class="form-group">
    <label for="texto">Texto</label>
    <textarea class="form-control" id="texto" name="texto" rows="3">{{isset($registro->texto) ? $registro->texto : ''}}</textarea>
    <script>
        CKEDITOR.replace('texto');
    </script>
</fieldset>

<fieldset class="form-group">
    <label for="categoria">Categoria</label>
    <select class="form-control" id="id_categoria" name="id_categoria">
        <option >Selecione</option>
        @foreach ($categorias as $l)

        <option value="{{$l->id}}" {{isset($registro->id_categoria) && $registro->id_categoria == $l->id ? 'selected' : '' }}>{{$l->nome}}</option>
        @endforeach

    </select>
</fieldset>

<div class="col-md-3">
    <fieldset class="form-group">
        <label for="valor_adulto_alta">Valor Adulto Alta Temporada</label>
        <input type="number" class="form-control" id="valor_adulto_alta" name="valor_adulto_alta" placeholder="R$" value="{{isset($registro->valor_adulto_alta) ? $registro->valor_adulto_alta : ''}}">
    </fieldset>
</div>
<div class="col-md-3">
    <fieldset class="form-group">
        <label for="valor_adulto_baixa">Valor Adulto Baixa Temporada</label>
        <input type="number" class="form-control" id="valor_adulto_baixa" name="valor_adulto_baixa" placeholder="R$" value="{{isset($registro->valor_adulto_baixa) ? $registro->valor_adulto_baixa : ''}}">
    </fieldset>
</div>
<div class="col-md-3">
    <fieldset class="form-group">
        <label for="valor_chd_alta">Valor CHD Alta Temporada</label>
        <input type="number" class="form-control" id="valor_chd_alta" name="valor_chd_alta" placeholder="R$" value="{{isset($registro->valor_chd_alta) ? $registro->valor_chd_alta : ''}}">
    </fieldset>
</div>
<div class="col-md-3">
    <fieldset class="form-group">
        <label for="valor_chd_baixa">Valor CHD Baixa Temporada</label>
        <input type="number" class="form-control" id="valor_chd_baixa" name="valor_chd_baixa" placeholder="R$" value="{{isset($registro->valor_chd_baixa) ? $registro->valor_chd_baixa : ''}}">
    </fieldset>
</div>



<div class="input-field">
    <label for="imagem" >Imagem:
        <input type="file" name="imagem" >
    </label>
    @if(isset($registro->imagem))
    <div class="input-field">
        <img width="150" src="{{asset($registro->imagem)}}" />
    </div>
    @endif
</div>



<div class="input-field">
    <p>
        <input type="checkbox" id="ativo" name="ativo" {{isset($registro->ativo) && $registro->ativo == 's' ? 'checked' : '' }} value="true" />
        <label for="test5">Ativo?</label>
        <small class="text-muted">Se esta opção não estiver marcada, este Canal não será visualizado no Site.
        </small>
    </p>
</div>