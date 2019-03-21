@extends('layouts.app', ['title' => __('Reports')])

@section('content')
    
    @include('layouts.headers.cards')

    <div class="container-fluid mt--7">
        <div class="row">
            <div class="col">
                <div class="card shadow">
                    <div class="card-header border-0">
                        <div class="row align-items-center">
                            <div class="col-8">
                                <h3 class="mb-0">{{ __('Reports') }}</h3>
                            </div>
                        </div>
                    </div>
                    <div class="nav-wrapper">
                    <div class="col-12">
                        @if (session('status'))
                            <div class="alert alert-success alert-dismissible fade show" role="alert">
                                <span class="alert-inner--icon"><i class="ni ni-like-2"></i></span>
                                {{ session('status') }}
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                        @endif
                    </div>

                    <div class="card mb-3">
                            <div class="card-body">
                              <div class="table-responsive">
                                    <table class="table align-items-center table-flush" id="dataTable">
                                            <thead class="thead-light">
                                                <tr>
                                                    <!-- <th scope="col">{{__('Action')}}</th> -->
                                                    <th scope="col">{{ __('WAHProperty#') }}</th>
                                                    <th scope="col">{{ __('Type') }}</th>
                                                    <th scope="col">{{ __('Details') }}</th>
                                                    <th scope="col">{{ __('Assigned to:') }}</th>
                                                    <!-- <th scope="col">{{ __('Date Procured') }}</th> -->
                                                </tr>
                                            </thead>
                                            <tbody>
                                            @forelse ($reports as $report)
                                            <tr>
                                                         <td>{{$report->wahProp}}</td>
                                                         <td>{{$report->type}}</td>
                                                         <td>{{$report->details}}</td>
                                                         <td>{{$report->name}}</td>
                                                         <!-- <td>{{$report->dateProc}}</td> -->
                                            </tr>
                                            @empty <tr><td>No records found</td></tr>
                                            @endforelse
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                    </div>
                </div>
            </div>
        </div>     
    </div>
    @include('layouts.footers.auth')
    <script>
        window.setTimeout(function() {
    $(".alert").fadeTo(400, 0).slideUp(400, function(){
        $(this).remove(); 
    });
}, 4000);
    </script>
@endsection