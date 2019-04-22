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
                                <h3 class="mb-0">{{ __('Item Movement') }}</h3>
                            </div>
                            <div class="col-4 text-right" >
                                <a href="/disposed"><button type="button" class="btn btn-sm btn-primary">{{ __('Go Back') }}</button></a>
                            </div>
                        </div>
                    </div>


                    <div class="card mb-3">
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table align-items-center table-flush table-dark table-advance" id="dataTableitemmove">
                                    <thead class="thead-dark">
                                    <tr>
                                        <th scope="col">{{__('Property #')}}</th>
                                        <th scope="col">{{__('Organization')}}</th>
                                        <th scope="col">{{ __('Item Type') }}</th>
                                        <th scope="col">{{__('Item Name')}}</th>
                                        <th scope="col">{{__('Age')}}</th>
                                        <th scope="col">{{__('Assigned To:')}}</th>
                                        <th scope="col">{{__('Date Recieved')}}</th>
                                        <th scope="col">{{__('Date Returned')}}</th>
                                        <th scope="col">{{__('Remarks')}}</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($movement as $movements)
                                        <tr>
                                            <td>{{$movements->prop_no}}</td>
                                            <td>{{$movements->org}}</td>
                                            <td>{{$movements->type}}</td>
                                            <td>{{$movements->item_name}}</td>
                                            
                                            <td>
                                                @php
                                                    $date = $movements->date_procured;
                                                    $date2 = \Carbon\Carbon::parse($movements->date_assigned);
                                                    $years = \Carbon\Carbon::parse($date)->diffInYears($date2);

                                                       echo $years;

                                                @endphp
                                            </td>
                                            <td>{{$movements->name}}</td>
                                            <td>{{$movements->date_assigned}}</td>
                                            <td>{{$movements->date_returned}}</td>
                                            <td>{{$movements->remarks}}</td>

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
