@include('layouts._includes.header_start')



@include('layouts._includes.header_end')

<!-- ============================================================== -->
<!-- Start right Content here -->
<!-- ============================================================== -->
<div class="content-page">
    <!-- Start content -->
    <div class="content">

        <div class="container">
            @yield('conteudo')
        </div>


    </div> <!-- container -->

</div> <!-- content -->


</div>
<!-- End content-page -->


<!-- ============================================================== -->
<!-- End Right content here -->
<!-- ============================================================== -->


@include('layouts._includes.footer_start')




@include('layouts._includes.footer_end')

