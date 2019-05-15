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

                    <div class="col-12">
                        @if (session('status'))
                            <div class="alert alert-success alert-dismissible fade show" role="alert">
                                <span class="alert-inner--icon"><i class="ni ni-like-2"></i></span>&nbsp;
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
                                <table class="table align-items-center table-flush table-dark table-advance" id="dataTableusershow">
                                    <thead class="thead-dark">
                                    <tr>
                                        
                                        <th scope="col"></th>
                                        <th scope="col">{{__('Property #')}}</th>
                                        <th scope="col">{{ __('Item Type') }}</th>
                                        <th scope="col">{{__('Item Name')}}</th>
                                        <th scope="col">{{__('Serial #')}}</th>
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
                                        <td><button style="background-color: Transparent;border: none;background-repeat:no-repeat;overflow: hidden;outline:none;"type="button" data-toggle="modal" data-target="#editdate"
                                                                  data-myid="{{$assign->id}}" data-mydate="{{$assign->date_assigned}}"><i id="" class="far fa-edit" style="color:white;"></i>
                                                                     </button></td>
                                        <td>{{$assign->prop_no}}</td>
                                        <td>{{$assign->type}}</td>
                                        <td>{{$assign->item_name}}</td>
                                        <td>{{$assign->serial_no}}</td>
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
        <div class="row">
  <div class="col-md-4">
      <div class="modal fade" id="editdate" tabindex="-1" role="dialog" aria-labelledby="modal-default" aria-hidden="true">
    <div class="modal-dialog modal- modal-dialog-centered modal-" role="document">
        <div class="modal-content">

            <div class="modal-header">
                <h2 class="modal-title" id="modal-title-default">Edit Assign Date:</h2>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>

            <div class="modal-body">
                        <form method="post" action="{{route('assignto.update','test')}}" autocomplete="off">
                        {{method_field('patch')}}
                    @csrf
                            
                            <div class="pl-lg-4">
                            <input type="text" value="" name="assign_id" hidden>
                            <div class="form-group">
                                <label class="form-control-label" for="date_assigned">{{ __('Date Assigned ') }}</label>
                                <div class="input-group input-group-alternative">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="ni ni-calendar-grid-58"></i></span>
                                    </div>
                                    <input  type="date" name="date_assigned" id="date_assigned" class="form-control" required autofocus>
                                   
                                </div>
                            </div>

</div>
<div class="modal-footer">
                <button type="submit" class="btn btn-success mt-4">{{ __('Confirm') }}</button>
                <button type="button" class="btn btn-link  ml-auto" data-dismiss="modal">Close</button>
            </div>
</form>
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

        $('#editdate').on('show.bs.modal', function (event){
            var button = $(event.relatedTarget);
            var assignid = button.attr('data-myid');
            var date = button.attr('data-mydate');
            var modal=$(this);

            $('input[name=assign_id]').val(assignid);
            $('input[name=date_assigned]').val(date);
            
        });
    </script>
@endsection
