<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>WAH Inventory</title>
        <!-- Favicon -->
        <link href="{{ asset('argon') }}/img/brand/favicon.png" rel="icon" type="image/png">
        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet">
        <!-- Icons -->
        <link href="{{ asset('argon') }}/vendor/nucleo/css/nucleo.css" rel="stylesheet">
        <link href="{{ asset('argon') }}/vendor/@fortawesome/fontawesome-free/css/all.min.css" rel="stylesheet">
        <!-- Argon CSS -->
        <link type="text/css" href="{{ asset('argon') }}/css/argon.css?v=1.0.0" rel="stylesheet">
        <!-- Datatables CSS -->
        <link href="{{ asset('argon') }}/vendor/datatables/dataTables.bootstrap4.css" rel="stylesheet">
    </head>
    <body class="{{ $class ?? '' }}">
        @auth()
            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                @csrf
            </form>
            @include('layouts.navbars.sidebar')
        @endauth
        
        <div class="main-content">
            @include('layouts.navbars.navbar')
            @yield('content')
        </div>

        @guest()
            @include('layouts.footers.guest')
        @endguest

        <script src="{{ asset('argon') }}/vendor/jquery/dist/jquery.min.js"></script>
        <script src="{{ asset('argon') }}/vendor/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
        <script src="{{ asset('argon') }}/vendor/datatables/jquery.dataTables.js"></script>
        <script src="{{ asset('argon') }}/vendor/datatables/dataTables.bootstrap4.js"></script>
        <script src="{{ asset('argon') }}/vendor/datatables/datatables-start.js"></script>

        @stack('js')
        
        <!-- Argon JS -->
        <script src="{{ asset('argon') }}/js/argon.js?v=1.0.0"></script>
        <script>
        $('#modal-default').on('show.bs.modal', function (event){
            var button = $(event.relatedTarget)
            var wah = button.data('mywah')
            var type = button.data('mytype')
            var detail = button.data('mydetail')
            var dateProc = button.data('mydate')
            var method = button.data('mymethod')
            var from = button.data('myfrom')
            var cost = button.data('mycost')
            var depre = button.data('mydepre')
            var assignto = button.data('myassignto')
            var modal =$(this)

            modal.find('.modal-body #wahProp').text(wah);
            modal.find('.modal-body #type').text(type);
            modal.find('.modal-body #detail').text(detail);
            modal.find('.modal-body #dateProc').text(dateProc);
            modal.find('.modal-body #method').text(method);
            modal.find('.modal-body #from').text(from);
            modal.find('.modal-body #cost').text(cost);
            modal.find('.modal-body #DV').text(depre);
            modal.find('.modal-body #assignto').text(assignto);
        });
        
        $('#editModal').on('show.bs.modal', function (event){
            var button = $(event.relatedTarget)
            var id = button.data('id')
            var wah = button.data('mywah')
            var type = button.data('mytype')
            var detail = button.data('mydetail')
            var dateProc = button.data('mydate')
            var method = button.data('mymethod')
            var from = button.data('myfrom')
            var cost = button.data('mycost')
            var depre = button.data('mydepre')
            var assignto = button.data('myassignto')
            var employ = button.data('myemploy')
            var modal=$(this)

            $('input[name=id]').val(id);
            $('input[name=wahProp]').val(wah);
            $('input[name=type]').val(type);
            $('input[name=details]').val(detail);
            $('input[name=dateProc]').val(dateProc);
            $('input[name=method]').val(method);
            $('input[name=from]').val(from);
            $('input[name=cost]').val(cost);
            $('input[name=depre]').val(depre);
            modal.find('.modal-body #assignTo1').text(employ);
            modal.find('.modal-body #assignTo1').val(assignto);
        });


        $('#employee-view').on('show.bs.modal', function(event){
        var button = $(event.relatadTarget)
        var empid = button.data('myid')
        var empname = button.data('myname')
        var empassignment = button.data('myassignment')
        var modal = $(this)

        modal.find('.modal-body #name'.).text(empname);
        modal.find('.modal-body #assignment').text(empassignment);
        
        });
        </script>

    </body>
</html>