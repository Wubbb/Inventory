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
                                <h3 class="mb-0">{{ __('Techbag') }}</h3>
                            </div>
                            <div class="col-4 text-right" >
                                <button id="add" type="button" class="btn btn-sm btn-primary" data-toggle="modal"
                                        data-target="#modal-addItem">{{ __('Add Techbag Itenerary') }}</button>
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
{{--                                    @foreach ($items as $item)--}}
{{--                                        <tr>--}}
{{--                                            <td>{{$item->prop_no}}</td>--}}
{{--                                            <td>{{$item->type}}</td>--}}
{{--                                            <td>{{$item->item_name}}</td>--}}
{{--                                            <td>{{$item->date_procured}}</td>--}}
{{--                                            <td>{{$item->life_span}}</td>--}}
{{--                                            <td>{{$item->disposed_date}}</td>--}}
{{--                                            <td>{{$item->disposed_method}}</td>--}}
{{--                                            <td>{{$item->remarks}}</td>--}}
{{--                                            <td>Button</td>--}}

{{--                                        </tr>--}}
{{--                                    @endforeach--}}
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
                <div class="modal fade" id="modal-addItem" tabindex="-1" role="dialog" aria-labelledby="modal-default" aria-hidden="true">
                    <div class="modal-dialog modal- modal-dialog-centered modal-" role="document">
                        <div class="modal-content">

                            <div class="modal-header">
                                <h2 class="modal-title" id="modal-title-default">Add Item here:</h2>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">×</span>
                                </button>
                            </div>

                            <div class="modal-body">
                                <form method="post" action="{{ route('items.store') }}" autocomplete="off">
                                    @csrf

                                    <div class="pl-lg-4">
                                        <div class="form-group{{ $errors->has('prop_no') ? ' has-danger' : '' }}">
                                            <label class="form-control-label" for="prop_no">{{ __('Property #') }}</label>
                                            <input type="text" name="prop_no" id="prop_no" class="form-control form-control-alternative{{ $errors->has('prop_no') ? ' is-invalid' : '' }}"  required autofocus>

                                            @if ($errors->has('prop_no'))
                                                <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('prop_no') }}</strong>
                                        </span>
                                            @endif
                                        </div>

                                        <div class="form-group">
                                            <label class="form-control-label" for="org">{{ __('Organization') }}</label>
                                            <select class="form-control form-control-alternative" name="org">
                                                <option value="WAH">WAH</option>
                                                <option value="WAH-Techbag">WAH-Techbag</option>
                                                <option value="HCI">HCI</option>
                                                <option value="Others">Others</option>
                                            </select>


                                        </div>

                                        <div class="form-group">
                                            <label class="form-control-label" for="type">{{ __('Item Type') }}</label>
                                            <input type="text" name="type" id="type" class="form-control form-control-alternative"  required>
                                        </div>

                                        <div class="form-group">
                                            <label class="form-control-label" for="item_name">{{ __('Item Name') }}</label>



                                            <input type="text" name="item_name" id="item_name" class="form-control form-control-alternative"  required>

                                        </div>
                                        <div class="form-group">
                                            <label class="form-control-label" for="source">{{ __('Source') }}</label>
                                            <select class="form-control form-control-alternative" name="source">
                                                <option value="WAH">WAH</option>
                                                <option value="PGT">PGT</option>
                                                <option value="RTI">RTI</option>
                                                <option value="Others">Others</option>
                                            </select>


                                        </div>


                                        <div class="form-group">
                                            <label class="form-control-label" for="date_procured">{{ __('Date Procured ') }}</label>
                                            <div class="input-group input-group-alternative">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text"><i class="ni ni-calendar-grid-58"></i></span>
                                                </div>
                                                <input  type="date" name="date_procured" id="date_procured" class="form-control"  required autofocus>

                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="form-control-label" for="date_acquired">{{ __('Date Acquired ') }}</label>
                                            <div class="input-group input-group-alternative">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text"><i class="ni ni-calendar-grid-58"></i></span>
                                                </div>
                                                <input  type="date" name="date_acquired" id="date_acquired" class="form-control" required autofocus>

                                            </div>
                                        </div>

                                    <!-- <div class="form-group">
                                        <label class="form-control-label" for="method">{{ __('Method') }}</label>
                                        <select class="form-control form-control-alternative" name="method">
                                            <option value="Purchased">Purchased</option>
                                            <option value="Donation">Donation</option>
                                        </select>


                                    </div> -->

                                    <!-- <div class="form-group">
                                        <label class="form-control-label" for="method">{{ __('From') }}</label>
                                        <input type="text" name="from" id="from" class="form-control form-control-alternative" required>


                                    </div>  -->

                                        <div class="form-group">
                                            <label class="form-control-label" for="cost">{{ __('Cost') }}</label>
                                            <input type="text" name="cost" id="cost" class="form-control form-control-alternative" required>


                                        </div>

                                        <div class="form-group">
                                            <label class="form-control-label" for="salvage_value">{{ __('Salvage Value') }}</label>
                                            <input type="text" name="salvage_value" id="salvage_value" class="form-control form-control-alternative" required>


                                        </div>

                                        <div class="form-group">
                                            <label class="form-control-label" for="life_span">{{ __('Life Span') }}</label>
                                            <input type="text" name="life_span" id="life_span" class="form-control form-control-alternative" required>


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
