<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Tin Tưc Tong Hop</title>

    <!--Bootstrap core CSS-->
    <link href="{!! asset('client/css/bootstrap.min.css') !!}" rel="stylesheet">

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.0/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

    <![endif]-->

    <!-- Custom styles for this template -->

    <link href="{!! asset('client/css/custom.css')!!}" rel="stylesheet ">
    <link href="{!! asset('client/css/responsive-style.css" rel="stylesheet')!!}">
    {{--<link href="client/css/weather-icons.min.css" rel="stylesheet">--}}
    <link rel="stylesheet" type="text/css" href="{!! asset('client/css/font-awesome.min.css')!!}" />
    <link href="{!! asset('client/css/lightbox.min.css')!!}" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="{!! asset('client/css/loaders.css')!!}"/>
    <base href="{{asset('')}}">
</head>

<body>
@include('client.layout.header')

@yield('content')
@include('client.layout.footer')
@yield('script')

<!-- Bootstrap core JavaScript
    ================================================== -->
<!-- Placed at the end of the document so the pages load faster -->
<script src="{!! asset('client/js/jquery.min.js')!!}"></script>
<script src="{!! asset('client/js/bootstrap.min.js')!!}"></script>
<script src="{!! asset('client/js/core.js')!!}"></script>
<script src="{!! asset('client/js/lightbox-plus-jquery.min.js')!!}"></script>
<script>
    $(document).ready(function() {
        $('ul.nav li.dropdown').hover(function() {
            $(this).find('.dropdown-menu').stop(true, true).delay(200).fadeIn(500);
        }, function() {
            $(this).find('.dropdown-menu').stop(true, true).delay(200).fadeOut(500);
        });
    });

</script>

</body>
</html>
