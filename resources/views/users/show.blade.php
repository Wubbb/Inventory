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
                                <h3 class="mb-0">Assigned Items To: {{$users->name}}</h3>
                                <h3 class="mb-0">Designation: {{$users->designation}}</h3>
                            </div>
                            <div class="col-4 text-right" >
                                <a href="/user"><button type="button" class="btn btn-sm btn-primary">{{ __('Go Back') }}</button></a>
                            </div>
                        </div>
                    </div>


                    <div class="card mb-3">
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table align-items-center table-flush table-dark table-advance" id="dataTableusershow">
                                    <thead class="thead-dark">
                                    <tr>
                                        <th scope="col">{{__('Property #')}}</th>
                                        <th scope="col">{{ __('Item Type') }}</th>
                                        <th scope="col">{{__('Item Name')}}</th>
                                        <th scope="col">{{__('Date Acquired')}}</th>
                                        <th scope="col">{{__('Date Assigned')}}</th>
                                        <th scope="col">{{__('Location')}}</th>
                                        <th scope="col">{{__('Date Returned')}}</th>
                                        <th scope="col">{{__('Remarks')}}</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($assigns as $assign)
                                        <tr>
                                        <td>{{$assign->prop_no}}</td>
                                        <td>{{$assign->type}}</td>
                                        <td>{{$assign->item_name}}</td>
                                        <td>
                                        @php
                                        $dateacquired = $assign->date_acquired;
                                        $dateacquired2 = \Carbon\Carbon::parse($dateacquired)->format('m/d/Y');

                                        echo $dateacquired2;
                                        @endphp
                                        </td>
                                        <td>
                                        @php
                                        $dateassign = $assign->date_assigned;
                                        $dateassign2 = \Carbon\Carbon::parse($dateassign)->format('m/d/Y');

                                        echo $dateassign2;
                                        @endphp
                                        </td>
                                        <td>{{$assign->location}}</td>
                                        <td>
                                        @if($assign->date_returned == "")
                                        <input id="r_{{$assign->id}}" type="date">
                                       
                                        
                                        @else
                                            @php
                                            $datereturn = $assign->date_returned;
                                            $datereturn2 = \Carbon\Carbon::parse($datereturn)->format('m/d/Y');
                                            echo $datereturn2;
                                            @endphp
                                         @endif
                                        </td>
                                        <td>
                                        @if($assign->remarks == "")
                                        <input id="c_{{$assign->id}}" type="text" onchange="returnItem({{$assign->id}})">
                                        @else
                                        {{$assign->remarks}}
                                        @endif
                                        </td>
                                    </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                                
                            </div>
                        </div>

                        <div class="col-11 text-right" >
                                <a href="/assign/{{$users->id}}"><button type="button" class="btn btn-sm btn-success">{{ __('Assign an Item') }}</button></a>
                            </div>
                            <div>
                            <br>
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
        function returnItem(e){
            var new_date_value = $("#r_" + e).val();
            var new_remark_value = $("#c_" + e).val();
            if(new_date_value == ""){
                $("#c_" + e).val("");
                alert("Please Set Retured Date!");
            }else{
            $.ajax({
                url: '/assignto',
                method: 'get',
                data: {
                    "_token": "{{ csrf_token() }}",
                    "date_returned": new_date_value,
                    "remarks": new_remark_value,
                    "item_id": e
                },
                success: function(result){
                    if(!alert(result)){window.location.reload();}
                }
            });
        }
        }
    </script>
@endsection
