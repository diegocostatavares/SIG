@php
	$route_name = Route::currentRouteName();
    $mostrar_visualizar = Auth::user()->can('auth_permission', $route_name.'.visualizar');
    $mostrar_editar = Auth::user()->can('auth_permission', $route_name.'.editar');
    $mostrar_excluir = Auth::user()->can('auth_permission', $route_name.'.excluir');
    $mostrar_acao = $mostrar_visualizar || $mostrar_editar || $mostrar_excluir;
@endphp


<td class="actions" nowrap="nowrap" align="right">

    @if ($mostrar_acao)

        <div class="btn-group">
            <button type="button" class="btn btn-primary dropdown-toggle waves-effect" data-toggle="dropdown" aria-expanded="false">Ação
                <span class="caret"></span>
            </button>

            <div class="dropdown-menu dropdown-menu-right dropdown-arrow profile-dropdown " aria-labelledby="Preview">

            @if ($mostrar_visualizar)
            <a href="{{ route($route_name.'.visualizar',$user->id_user) }}" class="dropdown-item notify-item text-success" style="line-height: 30px;">
                <i class="zmdi zmdi-eye"></i> <span>Visualizar</span>
            </a>
            @endif


            @if ($mostrar_editar)
            <a href="{{ route($route_name.'.editar',$user->id_user) }}" class="dropdown-item notify-item text-primary" style="line-height: 30px;">
                <i class="zmdi zmdi-edit"></i> <span>Editar</span>
            </a>
            @endif


            @if ($mostrar_excluir)
            <form  class="form-inline" method="POST" action="{{ route($route_name.'.excluir',$user->id_user) }}" onsubmit="return confirm('Tem certeza que deseja excluir?')">
                    {{ method_field('DELETE') }}
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                <button type="submit" class="dropdown-item notify-item text-danger" style="line-height: 30px;">
                    <i class="zmdi zmdi-delete"></i> <span>Excluir</span>
                </button>
            </form>
            @endif

            </div>
        </div>

    @else

        <div class="btn-group">-</div>

    @endif

</td>