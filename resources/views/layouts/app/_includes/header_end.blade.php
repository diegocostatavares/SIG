
    <!-- Bootstrap CSS -->
    <link href="{{asset('assets/app/css/bootstrap.min.css')}}" rel="stylesheet" type="text/css" />
    
    <!-- App CSS -->
    <link href="{{asset('assets/app/css/style.css?1')}}" rel="stylesheet" type="text/css" />

    <!-- Modernizr js -->
    <script src="{{asset('assets/app/js/modernizr.min.js')}}"></script>

    <!-- animsition.css -->
	<!-- <link rel="stylesheet" href="{{asset('assets/app/plugins/animsition/css/animsition.min.css')}}"> -->


</head>

<body class="fixed-left">

<!-- Begin page -->
<!-- PARA DEIXAR O MENU LATERAL DIMINUIDO ACRESCENTAR class="forced enlarged" -->
<div id="wrapper" class="forced enlarged">

    @include('layouts.app._includes.topbar')

    @include('layouts.app._includes.leftbar')




