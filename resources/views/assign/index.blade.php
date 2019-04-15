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
                    
                    <div class="card mb-3">
                            <div class="card-body">
                              <div class="table-responsive">
                                    <table class="table align-items-center table-flush table-dark table-advance" id="dataTable">
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
                                                         $years = \Carbon\Carbon::parse($date)->age;

                                                            echo $years;

                                                         @endphp
                                                         </td>
                                                         

                                                         <td>
                                                                 <button type="button" class="btn btn-primary btn-sm" onclick="assignitem({{ $item->id }})">
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
        @include('layouts.footers.auth')
    </div>
    <script>
        window.setTimeout(function() {
    $(".alert").fadeTo(400, 0).slideUp(400, function(){
        $(this).remove(); 
    });
}, 4000);
    localStorage.setItem("emp_id",{{ $users->id }});

    function assignitem(e){
        
        $.ajax({
            url: '/assignto',
            method: 'post',
            data: {
                "emp_id":  localStorage.getItem("emp_id"),
                "item_id": e,
                "_token": "{{ csrf_token() }}"
            },
            success: function(result){
                console.log(result);
                switch(result){
                    case "1": alert("Item Assigned Successfully!");
                    location.reload(); break;
                    case "0": alert("Something went wrong");break;
                    case "2": alert("Item Already Assigned!");break;
                }
                
            }
        });
    }
    </script>
   
@endsection
