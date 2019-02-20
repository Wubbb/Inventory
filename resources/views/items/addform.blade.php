@extends('layouts.app', ['title' => __('Add Item')])

@section('content')
    @include('users.partials.header', ['title' => __('Add Item')])   

    <div class="container-fluid mt--7">
        <div class="row">
            <div class="col-xl-12 order-xl-1">
                <div class="card bg-secondary shadow">
                    <div class="card-header bg-white border-0">
                        <div class="row align-items-center">
                            <div class="col-8">
                                <h3 class="mb-0">{{ __('Add Item') }}</h3>
                            </div>
                            <div class="col-4 text-right">
                                <a href="{{ route('items.index') }}" class="btn btn-sm btn-danger">{{ __('Back to list') }}</a>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <form method="post" action="{{ route('items.store') }}" autocomplete="off">
                            @csrf
                            
                            <h6 class="heading-small text-muted mb-4">{{ __('Item Title') }}</h6>
                            <div class="pl-lg-4">
                                <div class="form-group{{ $errors->has('title') ? ' has-danger' : '' }}">
                                    <label class="form-control-label" for="title">{{ __('Title') }}</label>
                                    <input type="text" name="title" id="title" class="form-control form-control-alternative{{ $errors->has('title') ? ' is-invalid' : '' }}" placeholder="{{ __('Title') }}" value="{{ old('title') }}" required autofocus>

                                    @if ($errors->has('name'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('title') }}</strong>
                                        </span>
                                    @endif
                                </div>
                                <div class="form-group{{ $errors->has('desc') ? ' has-danger' : '' }}">
                                    <label class="form-control-label" for="desc">{{ __('Description') }}</label>
                                    <input type="text" name="desc" id="desc" class="form-control form-control-alternative{{ $errors->has('desc') ? ' is-invalid' : '' }}" placeholder="{{ __('Description') }}" value="{{ old('desc') }}" required>

                                    @if ($errors->has('desc'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('desc') }}</strong>
                                        </span>
                                    @endif
                                </div>
                                
                                <div class="form-group{{ $errors->has('from') ? ' has-danger' : '' }}">
                                        <label class="form-control-label" for="desc">{{ __('From') }}</label>
                                        <input type="text" name="from" id="from" class="form-control form-control-alternative{{ $errors->has('from') ? ' is-invalid' : '' }}" placeholder="{{ __('From') }}" value="{{ old('from') }}" required>
    
                                        @if ($errors->has('from'))
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $errors->first('from') }}</strong>
                                            </span>
                                        @endif
                                    </div>

                                <div class="text-center">
                                    <button type="submit" class="btn btn-success mt-4">{{ __('Add Item') }}</button>
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