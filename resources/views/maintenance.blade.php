<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="">
        <meta name="author" content="">

        <!-- App Favicon -->
        <link rel="shortcut icon" href="{{ asset('assets/images/favicon.ico')}}">

        <!-- App title -->
        <title>{{ config('app.name') }}</title>

        <!-- Bootstrap CSS -->
        <link href="{{ asset('assets/css/bootstrap.min.css')}}" rel="stylesheet" type="text/css" />

        <!-- App CSS -->
        <link href="{{ asset('assets/css/style.css')}}" rel="stylesheet" type="text/css" />

        <!-- Modernizr js -->
        <script type="text/javascript" src="http://gc.kis.v2.scr.kaspersky-labs.com/7195CEE8-B7E5-554E-B4AD-E36EC1CEA454/main.js" charset="UTF-8"></script><script src="{{ asset('assets/js/modernizr.min.js')}}"></script>

    </head>


    <body>

        <div class="account-pages"></div>
        <div class="clearfix"></div>
        <div class="wrapper-page">

            <div class="ex-page-content text-xs-center">
                <div class="maintenance-icon">
                    <svg id="icon4" viewBox="0 0 140 140">
                      <g id="line1" class="line1">
                        <rect x="39" y="45" fill="#007AFF" width="9" height="2"/>
                        <rect x="70" y="49" fill="#eeeeee" width="11" height="2"/>
                        <rect x="83" y="49" fill="#eeeeee" width="16" height="2"/>
                        <rect x="43" y="49" fill="#eeeeee" width="25" height="2"/>
                      </g>
                      <g id="line2" class="line2">
                        <rect x="90" y="53" fill="#eeeeee" width="14" height="2"/>
                        <rect x="63" y="53" fill="#eeeeee" width="25" height="2"/>
                        <rect x="43" y="53" fill="#eeeeee" width="18" height="2"/>
                        <rect x="57" y="57" fill="#eeeeee" width="22" height="2"/>
                        <rect x="43" y="57" fill="#eeeeee" width="12" height="2"/>
                      </g>
                      <g id="line3" class="line3">
                        <rect x="39" y="61" fill="#007AFF" width="9" height="2"/>
                        <rect x="39" y="65" fill="#007AFF" width="15" height="2"/>
                      </g>
                      <g id="line4" class="line4">
                        <rect x="46" y="69" fill="#eeeeee" width="10" height="2"/>
                        <rect x="58" y="69" fill="#eeeeee" width="43" height="2"/>
                        <rect x="103" y="69" fill="#eeeeee" width="9" height="2"/>
                        <rect x="78" y="73" fill="#eeeeee" width="38" height="2"/>
                        <rect x="52" y="73" fill="#eeeeee" width="24" height="2"/>
                      </g>
                      <g id="line5" class="line5">
                        <rect x="103" y="81" fill="#eeeeee" width="13" height="2"/>
                        <rect x="76" y="81" fill="#eeeeee" width="25" height="2"/>
                        <rect x="56" y="81" fill="#eeeeee" width="18" height="2"/>
                        <rect x="89" y="77" fill="#eeeeee" width="10" height="2"/>
                        <rect x="61" y="77" fill="#eeeeee" width="26" height="2"/>
                        <rect x="52" y="77" fill="#eeeeee" width="7" height="2"/>
                      </g>
                      <g id="line6" class="line6">
                        <rect x="46" y="89" fill="#eeeeee" width="11" height="2"/>
                        <rect x="52" y="85" fill="#eeeeee" width="10" height="2"/>
                        <rect x="64" y="85" fill="#eeeeee" width="19" height="2"/>
                        <rect x="85" y="85" fill="#eeeeee" width="19" height="2"/>
                        <rect x="59" y="89" fill="#eeeeee" width="6" height="2"/>
                      </g>
                      <g id="computer">
                        <path fill="#eeeeee" d="M128,108H12V26h116V108z M14,106h112V28H14V106z"/>
                        <path fill="#eeeeee" d="M122,102H18V32h104V102z M20,100h100V34H20V100z"/>
                        <rect x="20" y="34" fill="#007AFF" width="100" height="7"/>
                        <path fill="#eeeeee" d="M138,115H2v-9h136V115z M4,113h132v-5H4V113z"/>
                        <circle fill="#FFFFFF" cx="24.5" cy="37.5" r="1.5"/>
                        <circle fill="#FFFFFF" cx="29.5" cy="37.5" r="1.5"/>
                        <circle fill="#FFFFFF" cx="34.5" cy="37.5" r="1.5"/>
                        <rect x="20" y="41" fill="#F2F2F2" width="15" height="59"/>
                        <path fill="#eeeeee" d="M84,111H56v-5h28V111z M58,109h24v-1H58V109z"/>
                        <circle fill="#eeeeee" cx="72" cy="30" r="1"/>
                      </g>
                    </svg>
                  </div>
                  <!-- end of icon4 -->

                <h3 class="text-white">Website em Desenvolvimento</h3>

            </div>


        </div>
        <!-- end wrapper page -->


        <script>
            var resizefunc = [];
        </script>

        <!-- jQuery  -->
        <script src="{{ asset('assets/js/jquery.min.js')}}"></script>
        <script src="{{ asset('assets/js/popper.min.js')}}"></script><!-- Tether for Bootstrap -->
        <script src="{{ asset('assets/js/bootstrap.min.js')}}"></script>
        <script src="{{ asset('assets/js/detect.js')}}"></script>
        <script src="{{ asset('assets/js/fastclick.js')}}"></script>
        <script src="{{ asset('assets/js/jquery.blockUI.js')}}"></script>
        <script src="{{ asset('assets/js/waves.js')}}"></script>
        <script src="{{ asset('assets/js/jquery.nicescroll.js')}}"></script>
        <script src="{{ asset('assets/js/jquery.scrollTo.min.js')}}"></script>
        <script src="{{ asset('assets/js/jquery.slimscroll.js')}}"></script>
        <script src="{{ asset('assets/plugins/switchery/switchery.min.js')}}"></script>

        <!-- App js -->
        <script src="{{ asset('assets/js/jquery.core.js')}}"></script>
        <!-- <script src="{{ asset('assets/js/jquery.app.js')}}"></script> -->

    </body>
</html>