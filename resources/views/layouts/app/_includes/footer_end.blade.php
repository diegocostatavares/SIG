<!-- google analytic code -->


<!-- google analytic code ends here -->

<!-- following js will activate the menu in left side bar based on url -->
<script type="text/javascript">

    $(document).ready(function() {

        $("#sidebar-menu a").each(function() {
            if (this.href == window.location.href) {
                $(this).addClass("active");
                $(this).parent().addClass("active"); // add active to li of the current link
                $(this).parent().parent().prev().addClass("active"); // add active class to an anchor
                $(this).parent().parent().prev().click(); // click the item to make it drop
            }
        });


        var cssRule =
          "color: rgb(255, 32, 0);" +
          "font-size: 32px;" +
          "font-weight: bold;" +
          "text-shadow: 1px 1px 5px rgb(0, 0, 0);" +
          "filter: dropshadow(color=rgb(249, 162, 34), offx=1, offy=1);";
        console.log("%cAtenção, acesso não autorizado!", cssRule);


        
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