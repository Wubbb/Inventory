@extends('layouts.app', ['title' => __('Items')])

@section('content')
    @include('layouts.headers.cards')

    <div class="container-fluid mt--7">
        <div class="row">
            <div class="col">
                <div class="card shadow">
                    <div class="card-header border-0">
                        <div class="row align-items-center">
                            <div class="col-8">
                                <h3 class="mb-0">{{ __('Items') }}</h3>
                            </div>
                            <div class="col-4 text-right">
                                <a href="{{ route('items.create') }}" class="btn btn-sm btn-primary">{{ __('Add Item') }}</a>
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
                                    <table class="table align-items-center table-flush" id="dataTable">
                                            <thead class="thead-light">
                                                <tr>
                                                    <th scope="col">{{__('Id')}}</th>
                                                    <th scope="col">{{ __('Title') }}</th>
                                                    <th scope="col">{{ __('Description') }}</th>
                                                    <th scope="col">{{ __('From') }}</th>
                                                    <th scope="col">{{ __('Action') }}</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($items as $item)
                                                    <tr>
                                                         <td>{{$item->id }}</td>
                                                         <td>{{$item->title}}</td>
                                                         <td>{{$item->desc}}</td>
                                                         <td>{{$item->from}}</td>
                                                         <td><button type="button" class="btn btn-primary btn-sm">View</button>
                                                         <button type="button" class="btn btn-success btn-sm">Edit</button>
                                                            @csrf
                                                            @method("DELETE")
                                                            <button type="button" class="btn btn-danger btn-sm" name="submit" value="Delete">Delete</button>
                                                            <!-- <input type="submit" name="submit" value="Delete"> -->
                                                         </td>
                                                         <!-- <td> <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#modal-default" data-target="{{$item->id}}">View </button></td> -->
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
        <div class="row">
                <div class="col-md-4">
                    <div class="modal fade" id="modal-default" tabindex="-1" role="dialog" aria-labelledby="modal-default" aria-hidden="true">
                  <div class="modal-dialog modal- modal-dialog-centered modal-" role="document">
                      <div class="modal-content">
                          
                          <div class="modal-header">
                              <h1 class="modal-title" id="modal-title-default">{{$item->title}}</h1>
                              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                  <span aria-hidden="true">×</span>
                              </button>
                          </div>
                        
                        <div class="modal-body" id="example">
                                <td>{{ $item->id }}</td>
                                <td>{{$item->title}}</td>
                                <td>{{$item->desc}}</td>
                                <td>{{$item->from}}</td>
                          </div>
        
                          <div class="modal-footer">
                              <button type="button" class="btn btn-primary">Save changes</button>
                              <button type="button" class="btn btn-link  ml-auto" data-dismiss="modal">Close</button> 
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