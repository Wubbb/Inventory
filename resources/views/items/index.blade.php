@extends('layouts.app', ['title' => __('Items')])

@section('title')
<title id="scroll">WAH Inventory</title>
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
                                <h3 class="mb-0">{{ __('Items') }}</h3>
                            </div>
                            <div class="col-4 text-right" >
                                <button id="add" type="button" class="btn btn-sm btn-primary" data-toggle="modal"
                                data-target="#modal-addItem">{{ __('Add Item') }}</button>
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
                            <table cellspacing="5" cellpadding="5" border="0" align="center">
        <tbody><tr>
            <td>Minimum age:</td>
            <td><input type="text" class="form-control" id="min1" name="min1" style="border-radius:3px;border:1px solid #cad1d7;height:30px; width:90%"></td>
        
            <td>Maximum age:</td>
            <td><input type="text" class="form-control" id="max1" name="max1" style="border-radius:3px;border:1px solid #cad1d7;height:30px; width:90%"></td>
        </tr>
    </tbody></table>
    <br>
                    <div class="card mb-3">
                            <div class="card-body">
                              <div class="table-responsive">
                                    <table class="table align-items-center table-flush table-dark table-advance" id="itemTable">
                                            <thead class="thead-dark">
                                                <tr>
                                                    <th scope="col"></th>
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
                                                        <td><i id="edit{{$item->id}}" class="far fa-edit"></i></td>
                                                         <td>{{$item->prop_no}}</td>
                                                         <td>{{$item->org}}</td>
                                                         <td>{{$item->type}}</td>
                                                         <td>{{$item->item_name}}</td>
                                                         <td>{{$item->location}}</td>
                                                         <td style="text-align:center;background-color:
                                                          @php
                                                         $date = $item->date_procured;
                                                         $years = \Carbon\Carbon::parse($date)->age;
                                                         
                                                         if(($item->life_span != '')&&($item->life_span <= $years)){
                                                         echo 'red';
                                                         }
                                                         @endphp">
                                                         @php
                                                         $date = $item->date_procured;
                                                         $years = \Carbon\Carbon::parse($date)->age;

                                                            echo $years;
                                                         if(($item->life_span != '')&&($item->life_span <= $years)){
                                                         echo '<div style="font-size:10px;">(For Replacement)</div>';
                                                         }

                                                         @endphp
                                                         </td>
                                                         

                                                         <td> <form action="items/{{$item->id}}" method="post">
                                                                 <a href="items/{{$item->id}}"><button type="button" class="btn btn-primary btn-sm">
                                                                         View Item Movement</button></a>

                                                            @csrf
                                                            @method("DELETE")
                                                            <button type="submit" class="btn btn-danger btn-sm" name="submit" value="Delete">Del</button>
                                                            <!-- <input type="submit" name="submit" value="Delete"> -->
                                                            </form>
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

 <!-- edit item modal --> 
 <div class="row">
  <div class="col-md-4">
  <div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="modal-default" aria-hidden="true">
    <div class="modal-dialog modal- modal-dialog-centered modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h2 class="modal-title" id="modal-title-default">Edit Item here:</h2>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
                  <div class="modal-body">
                    <form role="form" action="{{route('items.update','test')}}" method="post">
                    {{method_field('patch')}}
                    @csrf
                    <div class="box-body">
                    <div class="row">
                    <div class="col">
                        <div class="form-group">
                        <input type="text" class="form-control" name="id1" value="" hidden>
                          <label for="wahProp1">Property #</label> 
                          <input type="text" class="form-control" name="wahProp1" value="">
                        </div>
                        <div class="form-group">
                          <label for="org1">Organization</label> 
                          <!-- <input type="text" class="form-control" name="org1" value=""> -->
                          <select class="form-control form-control-alternative" name="org1">
                                            <option value="WAH">WAH</option>
                                            <option value="WAH-Techbag">WAH-Techbag</option>
                                            <option value="HCI">HCI</option>
                                            <option value="Others">Others</option>
                                        </select>
                        </div>
                        <div class="form-group">
                          <label for="type1">Item Type</label> 
                          <input type="text" class="form-control" name="type1" value="">
                        </div>
                        <div class="form-group">
                        <label for="name1">Item Name</label> 
                          <input type="text" class="form-control" name="name1" value="">
                          </div>
                          <div class="form-group">
                          <label for="source1">Source</label> 
                          <!-- <input type="text" class="form-control" name="source1" value=""> -->
                          <select class="form-control form-control-alternative" name="source1">
                                            <option value="WAH">WAH</option>
                                            <option value="PGT">PGT</option>
                                            <option value="RTI">RTI</option>
                                            <option value="Others">Others</option>
                                        </select>
                        </div>
                          <div class="form-group">
                        <label for="dateProc1">Date Procured</label> 
                          <input type="date" class="form-control" name="dateProc1" value="">
                          </div>
                          <div class="form-group">
                        <label for="dateAcq1">Date Acquired</label> 
                          <input type="date" class="form-control" name="dateAcq1" value="">
                          </div>
                          <div class="form-group">
                          <label for="loc1">Location</label> 
                          <input type="text" class="form-control" name="loc1" value="">
                        </div>
                           </div> <!-- end column -->
                           <div class="col">
                          <div class="form-group">
                        <label for="cost1">Cost</label> 
                          <input type="text" class="form-control" name="cost1" id="cost1" value="" onkeyup="compute()">
                          </div>
                          <div class="form-group">
                        <label for="salv_val1">Salvage Value</label> 
                          <input type="text" class="form-control" name="salv_val1" id="salv1" value="" onkeyup="compute()">
                          </div>
                          <div class="form-group">
                        <label for="life_span1">Life Span</label> 
                          <input type="text" class="form-control" name="life_span1" id="life_span1" value="" onkeyup="compute()">
                          </div>
                          <div class="form-group" style="height:200px;overflow:auto;">
                          <table class="table align-items-center table-flush">
                          <thead>
                          <tr>
                            <th scope="col">{{ __('Year') }}</th>
                            <th scope="col">{{ __('Cost') }}</th>
                            <th scope="col">{{ __('Book Value') }}</th>
                          </tr>
                          </thead>
                          
                          <tbody id="computation">
                          
                          </tbody>
                          </table>
                          </div>
                          <label for="disposed_date">Dispose Item</label>
                          <div style="border:2px solid #e6e6e6;padding:10px;border-radius:10px;">
                          <div class="form-group">
                        <label for="disposed_date">Dispose Date</label> 
                          <input type="date" class="form-control form-control-alternative" name="disposed_date" id="disposed_date" value="">
                          </div>
                          <div class="form-group">
                                        <label for="disposed_method">Dispose Method</label>
                                        <select class="form-control form-control-alternative" name="disposed_method" id="dispose" disabled>
                                            <option value=""></option>
                                            <option value="Throw">Throw</option>
                                            <option value="Lost">Lost</option>
                                            <option value="Donate">Donate</option>
                                            <option value="Sell">Sell</option>
                                        </select> 
                                    </div>
                                    <div class="form-group">
                        <label for="remarks">Remarks</label> 
                          <input type="text" class="form-control form-control-alternative" name="remarks" value="" id="dispose1" disabled>
                          </div>
                          </div>
                          </div> <!-- end column -->
                          </div> <!-- end row -->
                        <div class="modal-footer">
                        <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Save changes</button>
                      </div>
                    </form>
                  </div>
                </div>
              </div>
            </div> 
            </div>
           </div> 
</div>
    <!-- edit item modal end -->


    
<!--add item modal-->
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
                                        <input type="text" name="cost" id="cost" class="form-control form-control-alternative" >
    
                                       
                                    </div>  

                            <div class="form-group">
                                        <label class="form-control-label" for="salvage_value">{{ __('Salvage Value') }}</label>
                                        <input type="text" name="salvage_value" id="salvage_value" class="form-control form-control-alternative" >
    
                                       
                                    </div>  

                            <div class="form-group">
                                        <label class="form-control-label" for="life_span">{{ __('Life Span') }}</label>
                                        <input type="text" name="life_span" id="life_span" class="form-control form-control-alternative" >
    
                                       
                                    </div>

                            <div class="form-group">
                                        <label class="form-control-label" for="location">{{ __('Location') }}</label>
                                        <input type="text" name="location" id="location" class="form-control form-control-alternative" >
    
                                       
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
</div>
  <!--end add item modal-->  
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
    @foreach ($items as $item)
    <script>
    $("#edit{{$item->id}}").click(function(){
        $('#add').text("Edit Item");
        $('#add').attr("class","btn btn-success btn-sm");
        $('#add').attr("data-target","#editModal");
        $('#add').attr("data-myid","{{$item->id}}");
        $('#add').attr("data-myprop","{{$item->prop_no}}");
        $('#add').attr("data-myorg","{{$item->org}}");
        $('#add').attr("data-mytype","{{$item->type}}");
        $('#add').attr("data-myname","{{$item->item_name}}");
        $('#add').attr("data-mysource","{{$item->source}}");
        $('#add').attr("data-mydateproc","{{$item->date_procured}}");
        $('#add').attr("data-mydateacq","{{$item->date_acquired}}");
        $('#add').attr("data-mycost","{{$item->cost}}");
        $('#add').attr("data-mysalvage","{{$item->salvage_value}}");
        $('#add').attr("data-myspan","{{$item->life_span}}");
        $('#add').attr("data-myloc","{{$item->location}}");
        $('html, body').animate({
            scrollTop: $("#scroll").offset().top
        }, 200);
        
    });
    </script>
    @endforeach
    
    <script>
    function compute(){
                          var i;
                          var lf = document.getElementById("life_span1").value;
                          var cost = document.getElementById("cost1").value;
                          var salvage = document.getElementById("salv1").value;
                           text = "";
                           var total = cost-salvage;
                           var depre = total/lf;
                           var cost2 = cost;
                             for(i=1;i<=lf;i++){
                                cost = cost-depre;
                                cost = Math.max(0, cost);
                                cost = cost.toFixed(2);
                                text += "<tr>";
                                text += "<td>" + i + "</td>";
                                text += "<td>₱ " + cost2 + "</td>";
                                text += "<td>₱ " + cost + "</td>";
                                text += "</tr>";
                                cost2 = cost2-depre;
                                cost2 = cost2.toFixed(2);
                                
                             }
                             document.getElementById("computation").innerHTML = text;
    }
    
    </script>
    <script>
    $('#disposed_date').on('input', function() {
    
    if($(this).val().length){
       $('#dispose').prop('disabled', false);
       $('#dispose1').prop('disabled', false);
      
     }else{
        $('#dispose').prop('disabled', true);
        $('#dispose1').prop('disabled', true);
     }
        
});
    </script>
@endsection
