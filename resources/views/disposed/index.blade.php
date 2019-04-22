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
                                <h3 class="mb-0">{{ __('Disposed Items') }}</h3>
                            </div>
                        </div>
                    </div>
                    
                   
                    <div class="card mb-3">
                            <div class="card-body">
                              <div class="table-responsive">
                                    <table class="table align-items-center table-flush table-dark table-advance" id="dataTabledispose">
                                            <thead class="thead-dark">
                                                <tr>
                                                    
                                                    <th scope="col">{{__('Property #')}}</th>
                                                    <th scope="col">{{ __('Item Type') }}</th>
                                                    <th scope="col">{{__('Item Name')}}</th>
                                                    <th scope="col">{{__('Date Procured')}}</th>
                                                    <th scope="col">{{__('Age')}}</th>
                                                    <th scope="col">{{__('Life Span')}}</th>
                                                    <th scope="col">{{__('Disposed Date')}}</th>
                                                    <th scope="col">{{__('Dispose Method')}}</th>
                                                    <th scope="col">{{__('Remarks')}}</th>
                                                    <th scope="col">{{__('Action')}}</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($items as $item)
                                                    <tr>
                                                         <td>{{$item->prop_no}}</td>
                                                         <td>{{$item->type}}</td>
                                                         <td>{{$item->item_name}}</td>
                                                         <td>{{$item->date_procured}}</td>
                                                         <td>
                                                         @php
                                                         $date = $item->date_procured;
                                                         $date2 = \Carbon\Carbon::parse($item->disposed_date);
                                                         $years = \Carbon\Carbon::parse($date)->diff($date2)->format('%y yrs, %m mos');

                                                            echo $years;
                                                        
                                                         @endphp
                                                         </td>
                                                         <td>{{$item->life_span}}</td>
                                                         <td>{{$item->disposed_date}}</td>
                                                         <td>{{$item->disposed_method}}</td>
                                                         <td>{{$item->remarks}}</td>
                                                         <td><a href="disposed/{{$item->id}}"><button type="button" class="btn btn-primary btn-sm">
                                                                         View Item Movement</button></a></td>
                                                         
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