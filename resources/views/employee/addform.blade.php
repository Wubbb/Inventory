@extends('layouts.app', ['title' => __('Add Employee')])

@section('title')
<title>WAH Inventory</title>
@endsection

@section('content')
    @include('users.partials.header', ['title' => __('Add Employee')])   

    <div class="container-fluid mt--7">
        <div class="row">
            <div class="col-xl-12 order-xl-1">
                <div class="card bg-secondary shadow">
                    <div class="card-header bg-white border-0">
                        <div class="row align-items-center">
                            <div class="col-8">
                                <h3 class="mb-0">{{ __('Add Employee') }}</h3>
                            </div>
                            <div class="col-4 text-right">
                                <a href="{{ route('employee.index') }}" class="btn btn-sm btn-danger">{{ __('Back to list') }}</a>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
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

                                <div class="text-center">
                                    <button type="submit" class="btn btn-success mt-4">{{ __('Add Employee') }}</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        
        @include('layouts.footers.auth')
    </div>
@endsection