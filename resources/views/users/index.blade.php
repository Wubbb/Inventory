@extends('layouts.app', ['title' => __('User Management')])

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
                                <h3 class="mb-0">{{ __('Employee ') }}</h3>
                            </div>
                            <div class="col-4 text-right">
                                <button id="addemp" class="btn btn-sm btn-primary" data-toggle="modal" data-target="#modal-addEmployee">{{ __('Add Employee') }}</button>
                            </div>
                        </div>
                    </div>

                    <div class="col-12">
                        @if (session('status'))
                            <div class="alert alert-success alert-dismissible fade show" role="alert">
                                {{ session('status') }}
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                        @endif
                        @if (session('failed'))
                            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                {{ session('failed') }}
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                        @endif
                    </div>

                    <div class="table-responsive">
                        <table class="table align-items-center table-flush">
                            <thead class="thead-light">
                                <tr>
                                    <th scope="col"></th>

                                    <th scope="col">{{ __('Employee No') }}</th>
                                    <th scope="col">{{ __('Full Name ') }}</th>
                                    <th scope="col">{{ __('Designation') }}</th>
                                    <th scope="col">{{ __('Active') }}</th>
                                    <th scope="col">{{__('Action') }}</th>
                                    <th scope="col"></th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($users as $user)
                                    <tr>
                                        <td><i id="useredit{{$user->id}}" class="far fa-edit"></i></td>
                                        <td>{{ $user->employee_no }}</td>
                                        <td>{{ $user->name }}</td>
                                        <td>{{ $user->designation }}</td>
                                        <td>{{ $user->active }}</td>
                                       <td> <a href="user/{{$user->id}}"><button type="button" class="btn btn-primary btn-sm">
                                                Assigned Item</button></a>
                                       </td>

                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    <div class="card-footer py-4">
                        <nav class="d-flex justify-content-end" aria-label="...">
                            {{ $users->links() }}
                        </nav>
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
                                <h2 class="modal-title" id="modal-title-default">Add Employee here:</h2>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">×</span>
                                </button>
                            </div>

                            <div class="modal-body">
                                <form method="post" action="{{ route('user.save') }}" autocomplete="off">
                                    @csrf

                                    <div class="form-group{{ $errors->has('employee_no') ? ' has-danger' : '' }}">
                                    
                                           
                                               <i class="ni ni-badge" style="font-size: 0.70em;"></i>
                                         
                                            <label class="form-control-label" for="prop_no" >{{ __('Employee No.') }}</label>
                                            <input class="form-control{{ $errors->has('employee_no') ? ' is-invalid' : '' }}"  type="text" name="employee_no" value="{{ old('employee_no') }}" required autofocus>
                                        
                                        @if ($errors->has('employee_no'))
                                            <span class="invalid-feedback" style="display: block;" role="alert">
                                        <strong>{{ $errors->first('employee_no') }}</strong>
                                    </span>
                                        @endif
                                    </div>
                                    <div class="form-group{{ $errors->has('name') ? ' has-danger' : '' }}">
                                        
                                            
                                            <i class="ni ni-circle-08" style="font-size: 0.70em;"></i>
                                            <label class="form-control-label" for="prop_no">{{ __('Full Name') }}</label>
                                            <input class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" type="text" name="name" value="{{ old('name') }}" required autofocus>
                                        
                                        @if ($errors->has('name'))
                                            <span class="invalid-feedback" style="display: block;" role="alert">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                        @endif
                                    </div>
                                    <div class="form-group{{ $errors->has('designation') ? ' has-danger' : '' }}">
                                        <i class="ni ni-single-copy-04" style="font-size: 0.70em;"></i>
                                        <label class="form-control-label" for="prop_no">{{ __('Designation') }}</label>
                                            <input class="form-control{{ $errors->has('designation') ? ' is-invalid' : '' }}" type="text" name="designation" value="{{ old('designation') }}" required autofocus>
                                        
                                        @if ($errors->has('designation'))
                                            <span class="invalid-feedback" style="display: block;" role="alert">
                                        <strong>{{ $errors->first('designation') }}</strong>
                                    </span>
                                        @endif
                                    </div>
                                    <div class="custom-control custom-control-alternative custom-checkbox">
                                        <input name="active" value="No" type="hidden">
                                        <input name="active" value="Yes" type="checkbox" checked>
                                        &nbsp; &nbsp;<span class="text-muted">{{ __('Active') }}</span>
                                    </div>
                               
                                    </div>
                                    <div class="modal-footer">
                                            <button type="submit" class="btn btn-primary mt-4">{{ __('Add Employee') }}</button>
                                        <button type="button" class="btn btn-link  ml-auto" data-dismiss="modal">Close</button>
                                    </div>
                                </form>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
            <!--end add employee modal-->
            
              <!--edit employee modal-->
        <div class="row">
            <div class="col-md-4">
                <div class="modal fade" id="editEmp" tabindex="-1" role="dialog" aria-labelledby="modal-default" aria-hidden="true">
                    <div class="modal-dialog modal- modal-dialog-centered modal-" role="document">
                        <div class="modal-content">

                            <div class="modal-header">
                                <h2 class="modal-title" id="modal-title-default">Edit Employee here:</h2>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">×</span>
                                </button>
                            </div>

                            <div class="modal-body">
                            <form role="form" action="{{route('user.change','emp')}}" method="post">
                    {{method_field('patch')}}
                    @csrf

                                    <div class="form-group">
                                    <input type="text" class="form-control" name="eid" value="" hidden>
                                    <i class="ni ni-badge" style="font-size: 0.70em;"></i>
                                         
                                         <label class="form-control-label" for="prop_no" >{{ __('Employee No.') }}</label>
                                            <input class="form-control" type="text" name="employee_no" value="" required autofocus>
                                        
                                        
                                    </div>
                                    <div class="form-group">
                                    <i class="ni ni-circle-08" style="font-size: 0.70em;"></i>
                                            <label class="form-control-label" for="prop_no">{{ __('Full Name') }}</label>
                                            <input class="form-control" type="text" name="ename" value="" required autofocus>
                                        
                                       
                                    </div>
                                    <div class="form-group">
                                    <i class="ni ni-single-copy-04" style="font-size: 0.70em;"></i>
                                        <label class="form-control-label" for="prop_no">{{ __('Designation') }}</label>
                                            <input class="form-control" type="text" name="design" value="" required autofocus>
                                        
                                    </div>
                                    <div class="custom-control custom-control-alternative custom-checkbox">
                                        <input name="active" value="No" type="hidden">
                                        <input id="activecheck" name="active" value="Yes" type="checkbox">
                                        &nbsp; &nbsp;<span class="text-muted">{{ __('Active') }}</span>
                                    </div>
                               
                                    </div>
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
            <!--end edit employee modal-->
        @include('layouts.footers.auth')
    </div>
    <script>
        window.setTimeout(function() {
    $(".alert").fadeTo(400, 0).slideUp(400, function(){
        $(this).remove(); 
    });
}, 4000);
    </script>
    @foreach ($users as $user)
    <script>
    $("#useredit{{$user->id}}").click(function(){
        $('#addemp').text("Edit Employee");
        $('#addemp').attr("class","btn btn-success btn-sm");
        $('#addemp').attr("data-target","#editEmp");
        $('#addemp').attr("data-myeid","{{$user->id}}");
        $('#addemp').attr("data-myempid","{{$user->employee_no}}");
        $('#addemp').attr("data-myename","{{$user->name}}");
        $('#addemp').attr("data-mydesign","{{$user->designation}}");
        $('#addemp').attr("data-myactive","{{$user->active}}");
        
    });
    </script>
    <script>
    $('#editEmp').on('show.bs.modal', function (event){
            var button = $(event.relatedTarget);
            var eid = button.attr('data-myeid');
            var emp = button.attr('data-myempid');
            var ename = button.attr('data-myename');
            var design = button.attr('data-mydesign');
            var active = button.attr('data-myactive');
            var modal=$(this);

            $('input[name=eid]').val(eid);
            $('input[name=employee_no]').val(emp);
            $('input[name=ename]').val(ename);
            $('input[name=design]').val(design);
           if(active == "Yes"){
            $('#activecheck').prop('checked', true);
           }else{
            $('#activecheck').prop('checked', false);
           }
        });

        $("#editEmp").on("hidden.bs.modal", function () {
            $('#addemp').text("Add Employee");
            $('#addemp').attr("class","btn btn-sm btn-primary");
            $('#addemp').attr("data-target","#modal-addEmployee");
        });
        </script>

    @endforeach
@endsection
