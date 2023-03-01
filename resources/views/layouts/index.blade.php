<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <meta name="description" content="">
    <meta name="author" content="">

    <title>Pod Talk - Free Bootstrap 5 CSS Template</title>

    <!-- CSS FILES -->
    <link rel="preconnect" href="https://fonts.googleapis.com">

    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>

    <link
        href="https://fonts.googleapis.com/css2?family=Montserrat:wght@300;400&family=Sono:wght@200;300;400;500;700&display=swap"
        rel="stylesheet">

    <link rel="stylesheet" href="{{asset('template/css/bootstrap.min.css')}}">

    <link rel="stylesheet" href="{{asset('template/css/bootstrap-icons.css')}}">

    <link rel="stylesheet" href="{{asset('template/css/owl.carousel.min.css')}}">

    <link rel="stylesheet" href="{{asset('template/css/owl.theme.default.min.css')}}">

    <link href="{{asset('template/css/templatemo-pod-talk.css')}}" rel="stylesheet">

    <!--

TemplateMo 584 Pod Talk

https://templatemo.com/tm-584-pod-talk

-->
</head>

<body>

    <main>

       @include('partials.nav')

       @include('partials.herosection')
           
        @yield('content')

        @include('sweetalert::alert')
       

       <!-- @include('partials.topik') -->

    </main>
    @include('partials.footer')


   


    <!-- JAVASCRIPT FILES -->
    <script src="{{asset('template/js/jquery.min.js')}}"></script>
    <script src="{{asset('template/js/bootstrap.bundle.min.js')}}"></script>
    <script src="{{asset('template/js/owl.carousel.min.js')}}"></script>
    <script src="{{asset('template/js/custom.js')}}"></script>
    @stack('tiny')
</body>

</html>