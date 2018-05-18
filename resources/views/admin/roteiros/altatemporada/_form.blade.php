<fieldset class="form-group">
    <label for="nome">Nome</label>
    <input type="text" class="form-control" id="nome" name="nome" placeholder="Nome do período..." value="{{isset($registro->nome) ? $registro->nome : ''}}">
    <small class="text-muted">Este será o título do período, Ex.: Carnaval, Natal.
    </small>
</fieldset>


<div class="form-group col-md-3">
    <label>Período</label>
    <div>
        <div class="input-daterange input-group" id="date-range">
            <input type="text" class="form-control" name="dt_inicio" id="dt_inicio" value="{{isset($registro->dt_inicio) ? $registro->dt_inicio : ''}}" />
            <span class="input-group-addon bg-custom b-0">até</span>
            <input type="text" class="form-control" name="dt_fim" id="dt_fim" value="{{isset($registro->dt_fim) ? $registro->dt_fim : ''}}" />
        </div>
    </div>
</div>


