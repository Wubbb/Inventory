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
                                <h3 class="mb-0">Assign Items To: {{$users->name}}</h3>
                            </div>
                            <div class="col-4 text-right" >
                                <a href="/user/{{$users->id}}"><button type="button" class="btn btn-sm btn-primary">{{ __('Go Back') }}</button></a>
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
                        @if (session('failed'))
                            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                <span class="alert-inner--icon"><i class="fa fa-exclamation-triangle"></i></span>&nbsp;
                                {{ session('failed') }}
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                        @endif
                    </div>
                    
                    <div class="card mb-3">
                            <div class="card-body">
                              <div class="table-responsive">
                                    <table class="table align-items-center table-flush table-dark table-advance" id="assign">
                                            <thead class="thead-dark">
                                                <tr>
                                                    <th scope="col">{{__('Property #')}}</th>
                                                    <th scope="col">{{ __('Organization') }}</th>
                                                    <th scope="col">{{ __('Item Type') }}</th>
                                                    <th scope="col">{{__('Item Name')}}</th>
                                                    <th scope="col">{{__('Location')}}</th>
                                                    <th scope="col">{{__('Age')}}</th>
                                                    <th scope="col">{{__('Action')}}</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($items as $item)
                                                    <tr>
                                                         <td>{{$item->prop_no}}</td>
                                                         <td>{{$item->org}}</td>
                                                         <td>{{$item->type}}</td>
                                                         <td>{{$item->item_name}}</td>
                                                         <td>{{$item->location}}</td>
                                                         <td>
                                                         @php
                                                         $date = $item->date_procured;
                                                         $years = \Carbon\Carbon::parse($date)->diff(\Carbon\Carbon::now())->format('%y years, %m months and %d days');
                                                         $age = \Carbon\Carbon::parse($date)->age;

                                                            echo $years;

                                                         @endphp
                                                         </td>
                                                         

                                                         <td>
                                                                 <button type="button" class="btn btn-primary btn-sm" data-myitemid="{{$item->id}}" data-mypropno="{{$item->prop_no}}" data-toggle="modal" data-target="#assigndate">
                                                                         Assign Item</button>

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

             <div class="row">
  <div class="col-md-4">
      <div class="modal fade" id="assigndate" tabindex="-1" role="dialog" aria-labelledby="modal-default" aria-hidden="true">
    <div class="modal-dialog modal- modal-dialog-centered modal-" role="document">
        <div class="modal-content">

            <div class="modal-header">
                <h2 class="modal-title" id="modal-title-default">Assign Date:</h2>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>

            <div class="modal-body">
                        <form method="post" action="{{ route('assignto.store') }}" autocomplete="off">
                            @csrf
                            
                            <div class="pl-lg-4">
                            <input type="text" value="{{$users->id}}" name="emp_id" hidden>
                            <input type="text" value="" name="item_id" hidden>
                            <h4>Item Property #</h4>
                            <h5 name="propno"></h5><br>
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
    localStorage.setItem("emp_id",{{ $users->id }});


    $('#assigndate').on('show.bs.modal', function (event){
            var button = $(event.relatedTarget);
            var itemid = button.attr('data-myitemid');
            var propno = button.attr('data-mypropno');
            var modal=$(this);

            $('input[name=item_id]').val(itemid);
            $('h5[name=propno]').text(propno);
            
        });

    // function assignitem(e){
        
    //     $.ajax({
    //         url: '/assignto',
    //         method: 'post',
    //         data: {
    //             "emp_id":  localStorage.getItem("emp_id"),
    //             "item_id": e,
    //             "_token": "{{ csrf_token() }}"
    //         },
    //         success: function(result){
    //             console.log(result);
    //             switch(result){
    //                 case "1": alert("Item Assigned Successfully!");
    //                 location.reload(); break;
    //                 case "0": alert("Something went wrong");break;
    //                 case "2": alert("Item Already Assigned!");break;
    //             }
                
    //         }
    //     });
    // }
    </script>
   
@endsection
