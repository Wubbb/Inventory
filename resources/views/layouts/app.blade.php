<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <meta name="csrf-token" content="{{ csrf_token() }}">

        @yield('title')
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
        <link href="{{ asset('argon') }}/vendor/datatables/buttons.dataTables.min.css" rel="stylesheet">
        <style>
        input[type='number'] {
            -moz-appearance:textfield;
        }

        input::-webkit-outer-spin-button,
        input::-webkit-inner-spin-button {
            -webkit-appearance: none;
        }
        </style>
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

      

        
        <script src="{{ asset('argon') }}/vendor/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
        <script src="{{ asset('argon') }}/vendor/datatables/jquery.dataTables.min.js"></script>
        <script src="{{ asset('argon') }}/vendor/datatables/dataTables.bootstrap4.js"></script>
        <script src="{{ asset('argon') }}/vendor/datatables/dataTables.buttons.min.js"></script>
        <script src="{{ asset('argon') }}/vendor/datatables/buttons.flash.min.js"></script>
        <script src="{{ asset('argon') }}/vendor/datatables/jszip.min.js"></script>
        <script src="{{ asset('argon') }}/vendor/datatables/pdfmake.min.js"></script>
        <script src="{{ asset('argon') }}/vendor/datatables/vfs_fonts.js"></script>
        <script src="{{ asset('argon') }}/vendor/datatables/buttons.html5.min.js"></script>
        <script src="{{ asset('argon') }}/vendor/datatables/buttons.print.min.js"></script>
        <script src="{{ asset('argon') }}/vendor/datatables/datatables-start.js"></script>
        <script src="{{ asset('argon') }}/vendor/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js"></script>

        @stack('js')
        
        <!-- Argon JS -->
        <script src="{{ asset('argon') }}/js/argon.js?v=1.0.0"></script>
        <script>
        // $('#modal-default').on('show.bs.modal', function (event){
        //     var button = $(event.relatedTarget)
        //     var wah = button.data('mywah')
        //     var type = button.data('mytype')
        //     var detail = button.data('mydetail')
        //     var dateProc = button.data('mydate')
        //     var method = button.data('mymethod')
        //     var from = button.data('myfrom')
        //     var cost = button.data('mycost')
        //     var depre = button.data('mydepre')
        //     var assignto = button.data('myassignto')
        //     var modal =$(this)

        //     modal.find('.modal-body #wahProp').text(wah);
        //     modal.find('.modal-body #type').text(type);
        //     modal.find('.modal-body #detail').text(detail);
        //     modal.find('.modal-body #dateProc').text(dateProc);
        //     modal.find('.modal-body #method').text(method);
        //     modal.find('.modal-body #from').text(from);
        //     modal.find('.modal-body #cost').text(cost);
        //     modal.find('.modal-body #DV').text(depre);
        //     modal.find('.modal-body #assignto').text(assignto);
        // });
        // $("#add").click(function(){
        //     var wah = $('#add').attr('data-mywah');
        // }):
        $('#editModal').on('show.bs.modal', function (event){
            var button = $(event.relatedTarget);
            var id = button.attr('data-myid');
            var wah = button.attr('data-myprop');
            var org = button.attr('data-myorg');
            var type = button.attr('data-mytype');
            var name = button.attr('data-myname');
            var source = button.attr('data-mysource');
            var dateproc = button.attr('data-mydateproc');
            var dateacq = button.attr('data-mydateacq');
            var cost = button.attr('data-mycost');
            var salvage = button.attr('data-mysalvage');
            var lifespan = button.attr('data-myspan');
            var modal=$(this);

            $('input[name=id1]').val(id);
            $('input[name=wahProp1]').val(wah);
            $('input[name=org1]').val(org);
            $('input[name=type1]').val(type);
            $('input[name=name1]').val(name);
            $('input[name=source1]').val(source);
            $('input[name=dateProc1]').val(dateproc);
            $('input[name=dateAcq1]').val(dateacq);
            $('input[name=cost1]').val(cost);
            $('input[name=salv_val1]').val(salvage);
            $('input[name=life_span1]').val(lifespan);
            
            var i;
            var cost1=cost;
            text = "";
            for(i=1;i<=lifespan;i++){
                cost1 = cost1-salvage;
                cost1 = Math.max(0, cost1);
                text += "<tr>";
                text += "<td>" + i + "</td>";
                text += "<td>" + salvage + "</td>";
                text += "<td>" + cost1 + "</td>";
                text += "</tr>";
            }
            document.getElementById("computation").innerHTML = text;

            
            // if(assignto > 0){
            // modal.find('.modal-body #assignTo1').text(employ);
            // modal.find('.modal-body #assignTo1').val(assignto);
            // $('.modal-body #assignTo').css('font-weight', 'bold');
            // }else{
            // modal.find('.modal-body #assignTo1').text("Not Assigned");
            // modal.find('.modal-body #assignTo1').val("0");
            // $('.modal-body #assignTo').css('font-weight', '');
            // }
            // $('#assignTo').change(function(){
            // var j = $(this);
            //  if(assignto > 0) {
            //       j.attr('disabled', true);
            //         }    
            //  else {
            //     j.attr('disabled', false);
            // }
            // }).trigger('change');
        });



        // $('#employee-view').on('show.bs.modal', function (event){
        //     var button = $(event.relatedTarget)
        //     var empid = button.data('empid')
        //     var modal =$(this)

        //     $('input[name=empid]').val(empid);
        
        // });
        $("#editModal").on("hidden.bs.modal", function () {
            $('#add').text("Add Item");
            $('#add').attr("class","btn btn-sm btn-primary");
            $('#add').attr("data-target","#modal-addItem");
        });
        </script>

    </body>
</html>