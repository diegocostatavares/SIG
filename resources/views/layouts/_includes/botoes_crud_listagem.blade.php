@php
	$route_name = Route::currentRouteName();
@endphp


@can('auth_permission', $route_name.'.visualizar')
    @php
    	$a_href_visualizar = " href=" . route($route_name.'.visualizar',$user->id_user); 
    	$button_class_visualizar = 'btn btn-success btn-xs active';
    	$i_class_visualizar = 'zmdi zmdi-eye active';
    @endphp
@else
    @php
    	$a_href_visualizar = '';
    	$button_class_visualizar = 'btn btn-success btn-xs disabled';
    	$i_class_visualizar = 'zmdi zmdi-eye disabled';
    @endphp
@endcan


@can('auth_permission', $route_name.'.editar')
    @php
    	$a_href_editar = " href=" . route($route_name.'.editar',$user->id_user); 
    	$button_class_editar = 'btn btn-primary btn-xs active';
    	$i_class_editar = 'zmdi zmdi-edit active';
    @endphp
@else
    @php
    	$a_href_editar = '';
    	$button_class_editar = 'btn btn-primary btn-xs disabled';
    	$i_class_editar = 'zmdi zmdi-edit disabled';
    @endphp
@endcan


@can('auth_permission', $route_name.'.excluir')
    @php
    	$a_href_deletar = " href=" . route($route_name.'.excluir',$user->id_user); 
    	$button_class_deletar = 'btn btn-danger btn-xs active';
    	$i_class_deletar = 'zmdi zmdi-delete active';
    @endphp
@else
    @php
    	$a_href_deletar = '';
    	$button_class_deletar = 'btn btn-danger btn-xs disabled';
    	$i_class_deletar = 'zmdi zmdi-delete disabled';
    @endphp
@endcan

<center>
	
    <a {{ $a_href_visualizar }}>
	    <button type="button" class="{{ $button_class_visualizar }}">
	    	<i class="{{ $i_class_visualizar }}"></i>
	    </button>
    </a>

    <a {{ $a_href_editar }}>
	    <button type="button" class="{{ $button_class_editar }}">
	    	<i class="{{ $i_class_editar }}"></i>
	    </button>
    </a>

    <a {{ $a_href_deletar }}>
	    <button type="button" class="{{ $button_class_deletar }}">
	    	<i class="{{ $i_class_deletar }}"></i>
	    </button>
    </a>

</center>