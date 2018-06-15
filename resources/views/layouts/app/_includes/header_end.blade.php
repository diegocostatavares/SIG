
    <!-- Bootstrap CSS -->
    <link href="{{asset('assets/app/css/bootstrap.min.css')}}" rel="stylesheet" type="text/css" />
    
    <!-- App CSS -->
    <link href="{{asset('assets/app/css/style.css')}}" rel="stylesheet" type="text/css" />

    <!-- Modernizr js -->
    <script src="{{asset('assets/app/js/modernizr.min.js')}}"></script>

</head>

<body class="fixed-left">

<!-- Begin page -->
<!-- PARA DEIXAR O MENU LATERAL DIMINUIDO ACRESCENTAR class="forced enlarged" -->
<div id="wrapper" class="forced enlarged">

    @include('layouts.app._includes.topbar')

    @include('layouts.app._includes.leftbar')




