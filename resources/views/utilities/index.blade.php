@extends('layouts.app', ['title' => __('Items')])

@section('title')
<title>WAH Inventory</title>
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
                                <h3 class="mb-0">{{ __('From') }}</h3>
                            </div>
                            <div class="col-4 text-right">
                            <a href="{{ route('items.index') }}" class="btn btn-sm btn-primary" data-toggle="modal" data-target="#modal-add">{{ __('Add') }}</a>
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
                                    <table class="table align-items-center table-flush table-dark" id="dataTable">
                                            <thead class="thead-dark">
                                                <tr>
                                                    <th scope="col">{{__('ID')}}</th>
                                                    <th scope="col">{{ __('From') }}</th>

                                                    <th scope="col">{{__('Action')}}</th> 

                                                </tr>
                                            </thead>
                                            <tbody>
                                            @foreach ($from as $froms)
                                            <tr>
                                            <td>{{$froms->id}}</td>
                                            <td>{{$froms->from_name}}</td>
                                            <td><button type="button" class="btn btn-success btn-sm">Edit</button></td>
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
<!--add from modal-->
<div class="row">
  <div class="col-md-4">
      <div class="modal fade" id="modal-add" tabindex="-1" role="dialog" aria-labelledby="modal-default" aria-hidden="true">
    <div class="modal-dialog modal- modal-dialog-centered modal-" role="document">
        <div class="modal-content">

            <div class="modal-header">
                <h2 class="modal-title" id="modal-title-default">Add here:</h2>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>

            <div class="modal-body">
            <form method="post" action="{{ route('utilities.store') }}" autocomplete="off">
                            @csrf
                            
                            <div class="pl-lg-4">
                                <div class="form-group{{ $errors->has('from') ? ' has-danger' : '' }}">
                                    <label class="form-control-label" for="from">{{ __('From') }}</label>
                                    <input type="text" name="from" id="from" class="form-control form-control-alternative{{ $errors->has('from') ? ' is-invalid' : '' }}" placeholder="{{ __('From') }}" value="{{ old('from') }}" required autofocus>

                                    @if ($errors->has('from'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('from') }}</strong>
                                        </span>
                                    @endif
                                </div>
                                
                            </div>                                     
                            <div class="modal-footer">
            <button type="submit" class="btn btn-success mt-4">{{ __('Add') }}</button>
                <button type="button" class="btn btn-link  ml-auto" data-dismiss="modal">Close</button>
            </div>
                        </form>
            </div>
            </div>

        </div>
    </div>
</div>
  <!--end add from modal-->  



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