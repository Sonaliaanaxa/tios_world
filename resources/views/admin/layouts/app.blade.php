<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ $title ?? "MedTo - Dashboard"}} </title>


    <!-- Favicon --
    <link rel="shortcut icon" type="image/x-icon" href="{{ asset('public/material/admin') }}/img/favicon.png">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="{{ asset('material/admin') }}/css/bootstrap.min.css">
    <link rel="stylesheet" href="{{ asset('material/admin') }}/assets2/css/bootstrap.min.css">

    <!-- Fontawesome CSS -->
    <link rel="stylesheet" href="{{ asset('material/admin') }}/css/font-awesome.min.css">

    <!-- Feathericon CSS -->
    <link rel="stylesheet" href="{{ asset('material/admin') }}/css/feathericon.min.css">

    <link rel="stylesheet" href="{{ asset('material/admin') }}/plugins/morris/morris.css">

    <!-- Main CSS -->
    <link rel="stylesheet" href="{{ asset('material/admin') }}/css/style.css">

    
    <!-- Fontawesome CSS -->
    <link rel="stylesheet" href="{{ asset('material/admin') }}/assets2/plugins/fontawesome/css/fontawesome.min.css">
    <link rel="stylesheet" href="{{ asset('material/admin') }}/assets2/plugins/fontawesome/css/all.min.css">

    <!-- Select2 CSS -->
    <link rel="stylesheet" href="{{ asset('material/admin') }}/assets2/plugins/select2/css/select2.min.css">

    <!-- Main CSS -->
    <link rel="stylesheet" href="{{ asset('material/admin') }}/assets2/css/style.css">


</head>
<body class="{{ $class ?? '' }}">
         @auth()
            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                @csrf
            </form>
     
        @endauth 
    <!-- jQuery --
    <script src="{{ asset('material/admin') }}/js/jquery-3.2.1.min.js"></script>

    <!-- Bootstrap Core JS --
    <script src="{{ asset('material/admin') }}/js/popper.min.js"></script>
    <script src="{{ asset('material/admin') }}/js/bootstrap.min.js"></script>

    <!-- Slimscroll JS --
    <script src="{{ asset('material/admin') }}/plugins/slimscroll/jquery.slimscroll.min.js"></script>

    <script src="{{ asset('material/admin') }}/plugins/raphael/raphael.min.js"></script>
    <script src="{{ asset('material/admin') }}/plugins/morris/morris.min.js"></script>
    <script src="{{ asset('material/admin') }}/js/chart.morris.js"></script>

    <!-- Custom JS --
    <script src="{{ asset('material/admin') }}/js/script.js"></script>



     <!-- Bootstrap Core JS --
     <script src="{{ asset('material/admin') }}/assets2/js/popper.min.js"></script>
    <script src="{{ asset('material/admin') }}/assets/js/bootstrap.min.js"></script>

    <!-- Sticky Sidebar JS --
    <script src="{{ asset('material/admin') }}/assets2/plugins/theia-sticky-sidebar/ResizeSensor.js"></script>
    <script src="{{ asset('material/admin') }}/assets2/plugins/theia-sticky-sidebar/theia-sticky-sidebar.js"></script>

    <!-- Select2 JS --
    <script src="{{ asset('material/admin') }}/assets2/plugins/select2/js/select2.min.js"></script>

    <!-- Custom JS --
    <script src="{{ asset('material/admin') }}/assets2/js/script.js"></script>

</body>