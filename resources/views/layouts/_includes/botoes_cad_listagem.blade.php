@php
	$route_name = Route::currentRouteName();
@endphp


@can('auth_permission', $route_name.'.cadastrar')
    @php
    	$a_href_cadastrar = " href=" . route($route_name.'.cadastrar'); 
    	$button_class_cadastrar = 'btn btn-success waves-effect waves-light active';
    	$i_class_cadastrar = 'zmdi zmdi-plus active';
    @endphp
@else
    @php
    	$a_href_cadastrar = '';
    	$button_class_cadastrar = 'btn btn-success waves-effect waves-light disabled';
    	$i_class_cadastrar = 'zmdi zmdi-plus disabled';
    @endphp
@endcan

<a {{ $a_href_cadastrar }}>
    <button type="button" class="{{ $button_class_cadastrar }}"">
        <span class="btn-label"><i class="{{ $i_class_cadastrar }}"></i></span>Adicionar
    </button>
</a>



