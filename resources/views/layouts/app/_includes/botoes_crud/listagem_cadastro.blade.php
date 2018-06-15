@php
	$route_name = Route::currentRouteName();
    $mostrar_cadastrar = Auth::user()->can('auth_permission', $route_name.'.cadastrar');
@endphp

@if ($mostrar_cadastrar)

<div class="row">
    <div class="col-12">
	    <div class="row">
	        <a href="{{ route($route_name.'.cadastrar') }}">
	            <button type="button" class="btn btn-success waves-effect waves-light active"">
	                <span class="btn-label"><i class="zmdi zmdi-plus active"></i></span>Adicionar
	            </button>
	        </a>
	    </div>
    </div>
</div>
<p></p>
@endif