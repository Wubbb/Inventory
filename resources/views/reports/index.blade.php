@extends('layouts.app', ['title' => __('Items')])

@section('title')
    <title>WAH Inventory</title>
@endsection

@section('content')
    @include('layouts.headers.cards')
<style>
/* .dataTables_wrapper .dataTables_filter {
float: right;
text-align: right;
visibility: hidden;
} */
table tfoot {
    display: table-row-group;
}
</style>
    <div class="container-fluid mt--7">
        <div class="row">
            <div class="col">
                <div class="card shadow">
                    <div class="card-header border-0">
                        <div class="row align-items-center">
                            <div class="col-8">
                                <h3 class="mb-0">{{ __('Techbag Reports') }}</h3>
                            </div>
                        </div>
                    </div>


                    <div class="card mb-3">
                        <div class="card-body">
                            <div class="table-responsive">
                            <table cellspacing="5" cellpadding="5" border="0" align="center">
        <tbody><tr>
        <td>Filter Location:</td>
           <td><select name="locatio" id="locatio" class="form-control" autocomplete="off">
                                            <option value="" selected>------</option>
                                            @foreach($location as $locations)
                                            <option value="{{$locations->location}}">{{$locations->location}}</option>
                                            @endforeach
                                            </select></td>
        
                                            <td>&nbsp;&nbsp;&nbsp;&nbsp;</td>
           
            <td>
            <input id="displa" name="displa" value="For Disposal" type="checkbox" autocomplete="off">
            &nbsp;<span class="text-muted" style="font-size:14px;">{{ __('Filter Items for Review') }}</span>
            </td>

        </tr>
    </tbody></table>
    <br>
                                <table class="table align-items-center table-flush table-dark table-advance" id="techbag">
                                    <thead class="thead-dark">
                                    <tr>

                                        <th scope="col">{{__('Location')}}</th>
                                        <th scope="col">{{ __('Item Type') }}</th>
                                        <th scope="col">{{__('Item Name')}}</th>
                                        <th scope="col">{{__('Age')}}</th>
                                        <th scope="col">{{__('Life Span')}}</th>
                                        <th scope="col">{{__('Cost')}}</th>
                                    <!-- <th scope="col">{{__('Action')}}</th> -->
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach ($items as $item)
                                        <tr>
                                            <td>{{$item->location}}</td>
                                            <td>{{$item->type}}</td>
                                            <td>{{$item->item_name}}</td>
                                            <td style="text-align:center;background-color:
                                                          @php
                                                         $date = $item->date_procured;
                                                         $age = \Carbon\Carbon::parse($date)->age;
                                                         
                                                         if(($item->life_span != '')&&($item->life_span <= $age)){
                                                         echo 'red';
                                                         }
                                                         @endphp">
                                                         @php
                                                         $date = $item->date_procured;
                                                         $years = \Carbon\Carbon::parse($date)->diff(\Carbon\Carbon::now())->format('%y years, %m months and %d days');
                                                         $age = \Carbon\Carbon::parse($date)->age;

                                                            echo $years;
                                                         if(($item->life_span != '')&&($item->life_span <= $age)){
                                                         echo '<div style="font-size:10px;display:none;">(For Disposal)</div>';
                                                         }

                                                         @endphp
                                                         </td>
                                            <td>@if($item->life_span=="")
                                            {{$item->life_span}}
                                            @else
                                            {{$item->life_span}} years
                                            @endif</td>
                                            <td>
                                            @if($item->cost=="")
                                            
                                            @else
                                            ₱ {{$item->cost}}
                                            @endif
                                            </td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                    <tfoot>
            <tr>
            <th></th>
            <th></th>
            <th></th>
            <th></th>
                <th style="text-align:right">Total:</th>
                <th></th>
            </tr>
        </tfoot>
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
