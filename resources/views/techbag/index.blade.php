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
                                <h3 class="mb-0">{{ __('Techbag Itenerary') }}</h3>
                            </div>
                            <div class="col-4 text-right" >
                                <button id="add" type="button" class="btn btn-sm btn-primary" data-toggle="modal"
                                        data-target="#modal-addItenerary">{{ __('Add Training') }}</button>
                            </div>
                        </div>
                    </div>
                    <div class="card mb-3">
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table align-items-center table-flush table-dark table-advance" id="dataTable">
                                    <thead class="thead-dark">
                                    <tr>

                                        <th scope="col">{{__('Location ')}}</th>
                                        <th scope="col">{{ __('Training') }}</th>
                                        <th scope="col">{{__('Purpose')}}</th>
                                        <th scope="col">{{__('Date Out')}}</th>
                                        <th scope="col">{{__('Date In')}}</th>
                                        <th scope="col">{{__('Action')}}</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach ($techbags as $techbag)
                                        <tr>
                                            <td>{{$techbag->location}}</td>
                                            <td>{{$techbag->training}}</td>
                                            <td>{{$techbag->purpose}}</td>
                                            <td>{{$techbag->date_out}}</td>
                                            <td>{{$techbag->date_in}}</td>
                                            <td>
                                                    <button type="button" class="btn btn-primary btn-sm">
                                                            Return</button>
                                            </td>

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


        <!--add techbag itenerary modal-->
        <div class="row">
            <div class="col-md-4">
                <div class="modal fade" id="modal-addItenerary" tabindex="-1" role="dialog" aria-labelledby="modal-default" aria-hidden="true">
                    <div class="modal-dialog modal- modal-dialog-centered modal-" role="document">
                        <div class="modal-content">

                            <div class="modal-header">
                                <h2 class="modal-title" id="modal-title-default">Add Training here:</h2>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">×</span>
                                </button>
                            </div>

                            <div class="modal-body">
                                <form method="post" action="{{ route('techbagItenerary.store') }}" autocomplete="off">
                                    @csrf

                                    <div class="pl-lg-4">
                                        <div class="form-group{{ $errors->has('location') ? ' has-danger' : '' }}">
                                            <label class="form-control-label" for="location">{{ __('Location') }}</label>
                                            <input type="text" name="location" id="location" class="form-control form-control-alternative{{ $errors->has('location') ? ' is-invalid' : '' }}"  required autofocus>

                                            @if ($errors->has('location'))
                                                <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('location') }}</strong>
                                        </span>
                                            @endif
                                        </div>

                                            <div class="form-group{{ $errors->has('training') ? ' has-danger' : '' }}">
                                                <label class="form-control-label" for="training">{{ __('Training') }}</label>
                                                <input type="text" name="training" id="training" class="form-control form-control-alternative{{ $errors->has('training') ? ' is-invalid' : '' }}"  required autofocus>

                                                @if ($errors->has('training'))
                                                    <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('training') }}</strong>
                                        </span>
                                                @endif
                                            </div>

                                        <div class="form-group{{ $errors->has('purpose') ? ' has-danger' : '' }}">
                                            <label class="form-control-label" for="purpose">{{ __('Purpose') }}</label>
                                            <input type="text" name="purpose" id="purpose" class="form-control form-control-alternative{{ $errors->has('purpose') ? ' is-invalid' : '' }}"  required autofocus>

                                            @if ($errors->has('purpose'))
                                                <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('purpose') }}</strong>
                                        </span>
                                            @endif
                                        </div>

                                        <div class="form-group">
                                            <label class="form-control-label" for="date_out">{{ __('Date Out ') }}</label>
                                            <div class="input-group input-group-alternative">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text"><i class="ni ni-calendar-grid-58"></i></span>
                                                </div>
                                                <input  type="date" name="date_out" id="date_out" class="form-control"  required autofocus>

                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="form-control-label" for="date_in">{{ __('Date In ') }}</label>
                                            <div class="input-group input-group-alternative">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text"><i class="ni ni-calendar-grid-58"></i></span>
                                                </div>
                                                <input  type="date" name="date_in" id="date_in" class="form-control"  autofocus>

                                            </div>
                                        </div>



                                        <div class="modal-footer">
                                            <button type="submit" class="btn btn-success mt-4">{{ __('Add Item') }}</button>
                                            <button type="button" class="btn btn-link  ml-auto" data-dismiss="modal">Close</button>
                                        </div>
                                </form>
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
