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
                                <h3 class="mb-0">{{ __('Employee') }}</h3>
                            </div>
                            <div class="col-4 text-right">
                            <a href="{{ route('items.index') }}" class="btn btn-sm btn-primary" data-toggle="modal" data-target="#modal-addEmployee">{{ __('Add Employee') }}</a>
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
                                                    <th scope="col">{{ __('Name') }}</th>
                                                    <th scope="col">{{ __('Department') }}</th>
                                                    <th scope="col">{{__('Action')}}</th> 
                                                </tr>
                                            </thead>
                                            <tbody>
                                            
                                            @foreach($employee as $employees)
                                            <tr>
                                            <td>{{$employees->id}}</td>
                                           <td> {{$employees->name}}</td>
                                           <td>{{$employees->assignment}}</td>
                                           <td> <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#modal-default" data-myid="{{$employees->id}}" data-myname="{{$employees->name}}" data-myassignment="{{$employees->assignment}}" >View </button>
                                                         <button type="button" class="btn btn-success btn-sm">Edit</button>
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

 <!--add employee modal-->
<div class="row">
  <div class="col-md-4">
      <div class="modal fade" id="modal-addEmployee" tabindex="-1" role="dialog" aria-labelledby="modal-default" aria-hidden="true">
    <div class="modal-dialog modal- modal-dialog-centered modal-" role="document">
        <div class="modal-content">

            <div class="modal-header">
                <h2 class="modal-title" id="modal-title-default">Add Item here:</h2>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>

            <div class="modal-body">
            <form method="post" action="{{ route('employee.store') }}" autocomplete="off">
                            @csrf
                            
                            <h6 class="heading-small text-muted mb-4">{{ __('Employee Name') }}</h6>
                            <div class="pl-lg-4">
                                <div class="form-group{{ $errors->has('name') ? ' has-danger' : '' }}">
                                    <label class="form-control-label" for="name">{{ __('Name') }}</label>
                                    <input type="text" name="name" id="name" class="form-control form-control-alternative{{ $errors->has('name') ? ' is-invalid' : '' }}" placeholder="{{ __('Name') }}" value="{{ old('name') }}" required autofocus>

                                    @if ($errors->has('name'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('name') }}</strong>
                                        </span>
                                    @endif
                                </div>
                                <div class="form-group{{ $errors->has('assignment') ? ' has-danger' : '' }}">
                                    <label class="form-control-label" for="assignment">{{ __('Assignment') }}</label>
                                    <input type="text" name="assignment" id="assignment" class="form-control form-control-alternative{{ $errors->has('assignment') ? ' is-invalid' : '' }}" placeholder="{{ __('Assignment') }}" value="{{ old('assignment') }}" required>

                                    @if ($errors->has('assignment'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('assignment') }}</strong>
                                        </span>
                                    @endif
                                </div>
                                <!-- <div class="form-group{{ $errors->has('assignment') ? ' has-danger' : '' }}">
                                <label class="form-control-label" for="assignment">{{ __('Assignment') }}</label>
                                <select class="form-control" name="assignment">
                                    <option value="Tech" id="">Tech</option>
                                    <option value="HPP" id="">HPP</option>
                                    <option value="OPS" id="">OPS</option>
                                
                                         </select>   
                                        @if ($errors->has('assigment'))
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $errors->first('assignment') }}</strong>
                                            </span>
                                        @endif
                                </select>
                            </div> -->
                            </div>                                     
                            <div class="modal-footer">
            <button type="submit" class="btn btn-success mt-4">{{ __('Add Employee') }}</button>
                <button type="button" class="btn btn-link  ml-auto" data-dismiss="modal">Close</button>
            </div>
                        </form>
            </div>
            </div>

        </div>
    </div>
</div>
  <!--end add employee modal-->  

  <!-- edit item modal -->   
  <div class="modal fade" id="editModal">
              <div class="modal-dialog">
                <div class="modal-content">
                  <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" align="center"><b>Edit Employee</b></h4>
                  </div>
                  <div class="modal-body">
                    <form role="form" action="{{route('employee.update','test')}}" method="post">
                    {{method_field('patch')}}
                    @csrf
                    <div class="box-body">
                        <div class="form-group">
                          <label for="type">Name</label> 
                          <input type="text" class="form-control" name="name" placeholder="name" value="">
                        </div>
                        <div class="form-group">
                        <label for="wahProp">Department</label> 
                          <input type="text" class="form-control" name="details" placeholder="Details" value="">
                          </div>
                          <!-- <div class="form-group">
                        <label for="wahProp">Assign To</label>  
                                <select class="form-control" name="assignTo">
                                    <option value="0" id="assignTo">Select Employee</option>
                                        @foreach ($employee as $employees)  
                                        <option value="{{$employees->id}}" id="assignTo">{{$employees->name}}</option>
                                        @endforeach
                                </select>                     
                        </div> -->
                        <div class="modal-footer">
                        <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Save changes</button>
                      </div>
                    </form>
                  </div>
                </div>
              </div>
            </div> 
           </div> 

    <!-- edit item modal end -->

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