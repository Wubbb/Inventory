@extends('layouts.app', ['title' => __('Items')])

@section('title')
<title>WAH Inventory - Assigned Equipment to: {{$employ->name}}</title>
@endsection

@section('content')
    @include('layouts.headers.cards')

    <div class="container-fluid mt--7">
        <div class="row">
            <div class="col">
                <div class="card shadow">
                    <div class="card-header border-0">
                        <div class="row align-items-center">
                            <div class="col-8">
                                <h3 class="mb-0">Assigned Equipment to: {{$employ->name}}</h3>
                            </div>
                            <div class="col-4 text-right">
                                <a href="/employee" class="btn btn-sm btn-danger">X</a>
                            </div>
                        </div>
                    </div>
                    
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
                                    <table class="table align-items-center table-flush table-dark" id="dataTable1">
                                            <thead class="thead-dark">
                                                <tr>
                                                    <th scope="col">{{__('')}}</th>
                                                    <th scope="col">{{ __('Equipment') }}</th>
                                                    <th scope="col">{{ __('From') }}</th>
                                                    <th scope="col">{{ __('Property #') }}</th>
                                                    <th scope="col">{{ __('Brand / Specs') }}</th>  
                                                    <th scope="col">{{ __('Status') }}</th>
                                                    <th scope="col">{{ __('Checked') }}</th>
                                                    <th scope="col">{{ __('Comment') }}</th>          
                                                </tr>
                                            </thead>
                                            <tbody>
                                            
                                            @foreach($employee as $key=>$employees)
                                           
                                            <tr>
                                            <td>{{++$key}}</td>
                                            <td> {{$employees->type}}</td>
                                            <td>{{$employees->from}}</td>
                                            <td>{{$employees->wahProp}}</td>
                                            <td>{{$employees->details}}</td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                           </tr>
                                               @endforeach                        
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                    </div>
                </div>
            </div>
        </div> 
 
        @include('layouts.footers.auth')
    </div>
        
    <script>
        window.setTimeout(function() {
    $(".alert").fadeTo(400, 0).slideUp(400, function(){
        $(this).remove(); 
    });
}, 4000);
    </script>
@endsection