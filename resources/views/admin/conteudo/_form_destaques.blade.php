<fieldset class="form-group">
    <label for="nome">Nome</label>
    <input type="text" class="form-control" id="titulo" name="titulo" placeholder="Nome do Destaque..." value="{{isset($registro->titulo) ? $registro->titulo : ''}}">
    <small class="text-muted">Este será o título do Destaque, que é um link em seu site.
    </small>
</fieldset>

<fieldset class="form-group">
    <label for="texto">Texto</label>
    <textarea class="form-control" id="texto" name="texto" rows="3">{{isset($registro->texto) ? $registro->texto : ''}}</textarea>
</fieldset>

<fieldset class="form-group">
    <label for="nome">Canal</label>
    <select class="form-control" id="id_canal" name="id_canal">
        <option >Selecione</option>
        @foreach ($id_canal as $cp)

        <option value="{{$cp->id}}" {{isset($registro->id_canal) && $registro->id_canal == $cp->id ? 'selected' : '' }}>{{$cp->nome}}</option>
        @endforeach

    </select>
    <small class="text-muted">Escolhendo esta opção, este canal será hierarquicamente dependente do Canal Pai.
    </small>
</fieldset>

<fieldset class="form-group">
    <label for="tipo">Tipo de Destaque</label>
    <select class="form-control" id="tipo" name="tipo">
        <option >Selecione</option>
        <option value="PF" {{isset($registro->tipo) && $registro->tipo == 'PF' ? 'selected' : '' }} >Principal Full</option>
        <option value="PS" {{isset($registro->tipo) && $registro->tipo == 'PS' ? 'selected' : '' }} >Principal Single</option>
        <option value="S" {{isset($registro->tipo) && $registro->tipo == 'S' ? 'selected' : '' }} >Secundário</option>

    </select>
    <small class="text-muted">Escolha onde esse destaque irá figurar na capa do site.
    </small>
</fieldset>

<fieldset class="form-group">
    <label for="ordem">Ordem</label>
    <input type="number" class="form-control" id="ordem" name="ordem" placeholder="Ordem do Destaque, apenas números" value="{{isset($registro->ordem) ? $registro->ordem : ''}}">
    <small class="text-muted">Qual a ordem de exibição? Será exibido ordenado do menor para maior número.
    </small>
</fieldset>



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

<fieldset class="form-group">
    <label for="link">Link</label>
    <input type="text" class="form-control" id="titulo" name="link" placeholder="http://Link Alternativo..." value="{{isset($registro->link) ? $registro->link : ''}}">
    <small class="text-muted">Esta é uma opção para linkar um endereço externo ou personalizado.
    </small>
</fieldset>

<fieldset class="form-group">
    <label for="video">Vídeo</label>
    <textarea class="form-control" id="texto" name="video" rows="2">{{isset($registro->video) ? $registro->video : ''}}</textarea>
    <small class="text-muted">Opção para vincular ao Destaque a url de um vídeo externo.
    </small>
</fieldset>

<div class="input-field">
    <p>
        <input type="checkbox" id="ativo" name="ativo" {{isset($registro->ativo) && $registro->ativo == 's' ? 'checked' : '' }} value="true" />
        <label for="test5">Ativo?</label>
        <small class="text-muted">Se esta opção não estiver marcada, este Canal não será visualizado no Site.
        </small>
    </p>
</div>