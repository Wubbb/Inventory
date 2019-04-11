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
                                <h3 class="mb-0">{{ __('Assigned Items') }}</h3>

                            </div>
                        </div>
                    </div>


                    <div class="card mb-3">
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table align-items-center table-flush table-dark table-advance" id="dataTable">
                                    <thead class="thead-dark">
                                    <tr>
                                        <th scope="col">{{__('Property #')}}</th>
                                        <th scope="col">{{ __('Item Type') }}</th>
                                        <th scope="col">{{__('Item Name')}}</th>
                                        <th scope="col">{{__('Date Acquired')}}</th>
                                        <th scope="col">{{__('Date Procured')}}</th>
                                        <th scope="col">{{__('Location')}}</th>
                                        <th scope="col">{{__('Date Returned')}}</th>
                                        <th scope="col">{{__('Remarks')}}</th>
                                        <th scope="col">{{__('Action')}}</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($assigns as $assign)
                                        <tr>
                                        <td>{{$assign->prop_no}}</td>
                                        <td>{{$assign->type}}</td>
                                        <td>{{$assign->item_name}}</td>
                                        <td>{{$assign->date_acquired}}</td>
                                        <td>{{$assign->date_procured}}</td>
                                        <td>{{$assign->location}}</td>
                                        <td>{{$assign->date_returned}}</td>
                                        <td>{{$assign->remarks}}</td>
                                        <td>Button</td>
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
