@include('layouts.app._includes.header_start')

<!-- extra css -->
@yield('header_page_extra')

@include('layouts.app._includes.header_end')


<!-- ============================================================== -->
<!-- Start right Content here -->
<!-- ============================================================== -->
<div class="content-page">
    <!-- Start content -->
    <div class="content">
        <div class="container-fluid">

            <div class="row">
                <div class="col-xl-12">
                    <div class="page-title-box">
                        <h4 class="page-title float-left">@yield('page-title')</h4>
                        @yield('breadcrumb')
                        <div class="clearfix"></div>
                    </div>
                </div>
            </div>
            <!-- end row -->

            @include('errors.flash-message')
            @yield('conteudo')

            <!--
            <div class="row">
                <div class="col-xl-12">
                    <div class="page-title-box">
                        <h4 class="page-title float-left">Starter Page</h4>

                        <ol class="breadcrumb float-right">
                            <li class="breadcrumb-item"><a href="#">Uplon</a></li>
                            <li class="breadcrumb-item"><a href="#">Pages</a></li>
                            <li class="breadcrumb-item active">Starter</li>
                        </ol> 
                        <div class="clearfix"></div>
                    </div>
                </div>
            </div>
            -->
            <!-- end row -->


            <!-- Modal -->
            <div id="custom-modal" class="custom-modal">
            </div>

        </div> <!-- container -->

    </div> <!-- content -->



</div>
<!-- End content-page -->

<!-- ============================================================== -->
<!-- End Right content here -->
<!-- ============================================================== -->


@include('layouts.app._includes.footer_start')

@include('layouts.app._includes.footer_end')
