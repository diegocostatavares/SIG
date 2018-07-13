<!-- google analytic code -->


<!-- google analytic code ends here -->

<!-- following js will activate the menu in left side bar based on url -->
<script type="text/javascript">

    $(document).ready(function() {

        // $(".animsition").animsition({
        //   inClass: 'fade-in',
        //   outClass: 'fade-out',
        //   inDuration: 1500,
        //   outDuration: 800,
        //   linkElement: '.animsition-link', 
        //   // e.g. linkElement: 'a:not([target="_blank"]):not([href^="#"])'
        //   loading: true,
        //   loadingParentElement: 'body', //animsition wrapper element
        //   loadingClass: 'animsition-loading',
        //   loadingInner: '', // e.g '<img src="loading.svg" />'
        //   timeout: false,
        //   timeoutCountdown: 5000,
        //   onLoadEvent: true,
        //   browser: [ 'animation-duration', '-webkit-animation-duration'],
        //   // "browser" option allows you to disable the "animsition" in case the css property in the array is not supported by your browser.
        //   // The default setting is to disable the "animsition" in a browser that does not support "animation-duration".
        //   overlay : false,
        //   overlayClass : 'animsition-overlay-slide',
        //   overlayParentElement : 'body',
        //   transition: function(url){ window.location.href = url; }
        // });

        $("#sidebar-menu a").each(function() {
            if (this.href == window.location.href) {
                $(this).addClass("active");
                $(this).parent().addClass("active"); // add active to li of the current link
                $(this).parent().parent().prev().addClass("active"); // add active class to an anchor
                $(this).parent().parent().prev().click(); // click the item to make it drop
            }
        });


        // var cssRule =
        //   "color: rgb(255, 32, 0);" +
        //   "font-size: 32px;" +
        //   "font-weight: bold;" +
        //   "text-shadow: 1px 1px 5px rgb(0, 0, 0);" +
        //   "filter: dropshadow(color=rgb(249, 162, 34), offx=1, offy=1);";
        // console.log("%cAtenção, acesso não autorizado!", cssRule);


        
        /***configura toast
         * 
         * 
         */
        toastr.options = {
          "closeButton": true,
          "debug": false,
          "newestOnTop": false,
          "progressBar": true,
          "positionClass": "toast-top-right",
          "preventDuplicates": false,
          "onclick": null,
          "showDuration": "300",
          "hideDuration": "1000",
          "timeOut": "5000",
          "extendedTimeOut": "1000",
          "showEasing": "swing",
          "hideEasing": "linear",
          "showMethod": "fadeIn",
          "hideMethod": "fadeOut"
        }
        /**
         * fim do bloco do ready
         */

    });

</script>

<?php

try {

  $getRouteCurrent = Route::current();

  if ($getRouteCurrent && $getRouteCurrent <> null) {
    
    $route_action_vet = $getRouteCurrent->getAction();
    $getActionNamespace = $getRouteCurrent->getAction()['namespace'];
    $controllerFull = $route_action_vet['controller'];

    $controllerNameAndAction = class_basename($controllerFull);
    list($controllerName, $actionName) = explode('@', $controllerNameAndAction);

    $controllerName = strtolower(str_replace('Controller', '', $controllerName));
    $actionName = strtolower($actionName);

    $subModulos = str_replace($getActionNamespace, '', str_replace($controllerNameAndAction, '', $controllerFull));
    $subModulos = explode('\\', $subModulos);
    $subModulos = array_filter($subModulos);

    $getModule = head($subModulos);
    $subModulos = array_values($subModulos);
    unset($subModulos[0]);

    $caminhoCompletoModulos = '';
    if (sizeof($subModulos)>0) {
      $caminhoCompletoModulos = strtolower('/assets/app/js/' . $getModule . '/' . (implode('/', $subModulos)));
    }
    else{
      $caminhoCompletoModulos = strtolower('/assets/app/js/' . $getModule);
    }

    if (stream_resolve_include_path(public_path().$caminhoCompletoModulos.'/geral.js')) {
        echo '<script src=' . asset($caminhoCompletoModulos.'/geral.js') . '></script>';
    }

    if (stream_resolve_include_path(public_path().$caminhoCompletoModulos.'/'.$controllerName.'.js')) {
        echo '<script src=' . asset($caminhoCompletoModulos.'/'.$controllerName.'.js') . '></script>';
    }

    if (stream_resolve_include_path(public_path().$caminhoCompletoModulos.'/'.$controllerName.'.'.$actionName.'.js')) {
        echo '<script src=' . asset($caminhoCompletoModulos.'/'.$controllerName.'.'.$actionName.'.js') . '></script>';
    }
  }
  
} catch (Exception $e) {
  //
}
?>

<!-- extra js -->
@yield('footer_page_extra')

@if(\Session::has('toastr'))

  @php
    $toastr = \Session::get('toastr');
    $toastr_tipo = $toastr['tipo'];
    $toastr_titulo = $toastr['titulo'];
    $toastr_msg = $toastr['msg'];
  @endphp

  <script type="text/javascript">
    $(document).ready(function() {
      toastr["{{ $toastr_tipo }}"]("{{ $toastr_msg }}", "{{ $toastr_titulo }}");
  });
  </script>

@endif

</body>
</html>