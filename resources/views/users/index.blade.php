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
                                <a href="{{ route('user.create') }}" class="btn btn-sm btn-primary" data-toggle="modal" data-target="#modal-addEmployee">{{ __('Add Employee') }}</a>
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
                    </div>

                    <div class="table-responsive">
                        <table class="table align-items-center table-flush">
                            <thead class="thead-light">
                                <tr>
                                    <th scope="col">{{ __('Employee #') }}</th>
                                    <th scope="col">{{ __('Full Name #') }}</th>
                                    <th scope="col">{{ __('Designation') }}</th>
                                    <th scope="col">{{__('Action') }}</th>
                                    <th scope="col"></th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($users as $user)
                                    <tr>
                                        <td>{{ $user->employee_no }}</td>
                                        <td>{{ $user->name }}</td>
                                        <td>{{ $user->designation }}</td>
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
                                <form method="post" action="{{ route('user.store') }}" autocomplete="off">
                                    @csrf

                                    <div class="form-group{{ $errors->has('employee_no') ? ' has-danger' : '' }}">
                                        <div class="input-group input-group-alternative mb-3">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text"><i class="ni ni-badge"></i></span>
                                            </div>
                                            <input class="form-control{{ $errors->has('employee_no') ? ' is-invalid' : '' }}" placeholder="{{ __('Employee No.') }}" type="text" name="employee_no" value="{{ old('employee_no') }}" required autofocus>
                                        </div>
                                        @if ($errors->has('employee_no'))
                                            <span class="invalid-feedback" style="display: block;" role="alert">
                                        <strong>{{ $errors->first('employee_no') }}</strong>
                                    </span>
                                        @endif
                                    </div>
                                    <div class="form-group{{ $errors->has('name') ? ' has-danger' : '' }}">
                                        <div class="input-group input-group-alternative mb-3">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text"><i class="ni ni-circle-08"></i></span>
                                            </div>
                                            <input class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" placeholder="{{ __('Full Name') }}" type="text" name="name" value="{{ old('name') }}" required autofocus>
                                        </div>
                                        @if ($errors->has('name'))
                                            <span class="invalid-feedback" style="display: block;" role="alert">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                        @endif
                                    </div>
                                    <div class="form-group{{ $errors->has('designation') ? ' has-danger' : '' }}">
                                        <div class="input-group input-group-alternative mb-3">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text"><i class="ni ni-single-copy-04"></i></span>
                                            </div>
                                            <input class="form-control{{ $errors->has('designation') ? ' is-invalid' : '' }}" placeholder="{{ __('Designation') }}" type="text" name="designation" value="{{ old('designation') }}" required autofocus>
                                        </div>
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
                                <!-- <div class="form-group{{ $errors->has('active') ? ' has-danger' : '' }}">
                                <div class="input-group input-group-alternative mb-3">
                                    <input class="form-control{{ $errors->has('active') ? ' is-invalid' : '' }}" type="checkbox" name="active" value="Yes" checked autofocus>Active
                                </div>
                                @if ($errors->has('active'))
                                    <span class="invalid-feedback" style="display: block;" role="alert">
                                        <strong>{{ $errors->first('active') }}</strong>
                                    </span>
                                @endif
                                    </div> -->

                                    </div>
                                    <div class="modal-footer">
                                            <button type="submit" class="btn btn-primary mt-4">{{ __('Create account') }}</button>
                                        <button type="button" class="btn btn-link  ml-auto" data-dismiss="modal">Close</button>
                                    </div>
                                </form>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
            <!--end add employee modal-->
            
        @include('layouts.footers.auth')
    </div>
@endsection
