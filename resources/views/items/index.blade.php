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
                                    <table class="table align-items-center table-flush table-dark table-advance" id="dataTable">
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
                                                         <td>
                                                         @php
                                                         $date = $item->date_acquired;
                                                         $date = explode("-", $date);

                                                         $age = (date("md", date("U", mktime(0, 0, 0, $date[2], $date[1], $date[0]))) > date("md") ? ((date("Y")-$date[0])-1):(date("Y")-$date[0]));
                                                         

                                                         echo $age;

                                                         @endphp
                                                         </td>
                                                         

                                                         <td> <form action="items/{{$item->id}}" method="post">
                                                         <button type="button" class="btn btn-primary btn-sm"
                                                          data-toggle="modal"
                                                         data-target="#modal-default" >View Item Movement</button>
                                                        
                                                         <!-- <button id="btn-edit{{$item->id}}" type="button" class="btn btn-success btn-sm"
                                                         data-toggle="modal" 
                                                         data-target="#editModal"
                                                         data-id="{{$item->id}}" 
                                                         data-mywah="{{$item->prop_no}}"
                                                         data-myorg="{{$item->org}}" 
                                                         data-mytype="{{$item->type}}" 
                                                         data-mydetail="{{$item->item_name}}"
                                                         data-mydate="{{$item->date_procured}}" 
                                                         data-myacquired="{{$item->date_acquired}}" 
                                                         data-myfrom="{{$item->source}}" 
                                                         data-mysalvage="{{$item->salvage_value}}"
                                                         data-mycost="{{$item->cost}}" 
                                                         data-myspan="{{$item->life_span}}">Edit</button> -->
                                                         
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

        <!--view modal item details-->
        <!-- <div class="row">
                <div class="col-md-4">
                    <div class="modal fade" id="modal-default" tabindex="-1" role="dialog" aria-labelledby="modal-default" aria-hidden="true">
                  <div class="modal-dialog modal- modal-dialog-centered modal-lg modal-dark" role="document">
                      <div class="modal-content">
                          
                          <div class="modal-header">
                          <div id="title"><h1 class="modal-title" id="modal-title-default"></h1></div>
                              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                  <span aria-hidden="true">×</span>
                              </button>
                          </div>
                        
                        <div class="modal-body" id="example">
                        <table class="table align-items-center table-flush">
                        <thead>
                        <tr>
                            <th scope="col">{{__('Wah Property #')}}</th>
                            <th scope="col">{{ __('Type') }}</th>
                            <th scope="col">{{ __('Details') }}</th>
                            <th scope="col">{{ __('Date Procured') }}</th>
                        </tr>
                        </thead>
                        <tr>
                                <td><div id="wahProp"></div></td>
                                <td><div id="type"></div></td>
                                <td><div id="detail"></div></td>
                                <td><div id="dateProc"></div></td>
                        </tr>
                        <thead>
                        <tr>
                            <th scope="col">{{ __('Method') }}</th>
                            <th scope="col">{{ __('From') }}</th>
                            <th scope="col">{{ __('Cost') }}</th>
                            <th scope="col">{{ __('Depreciation Value') }}</th>
                        </tr>
                        </thead>
                        <tr>
                                <td><div id="method"></div></td>
                                <td><div id="from"></div></td>
                                <td><div id="cost"></div></td>
                                <td><div id="DV"></div></td>
                        </tr>
                        <thead>
                        <tr>
                            <th scope="col">{{ __('Assigned To') }}</th>
                        </tr>
                        </thead>
                        <tr>
                                <td><div id="assignto"></div></td>
                        </tr>
                        </table>
                        </div>
        
                          <div class="modal-footer">
                              <button type="button" class="btn btn-primary ml-auto" data-dismiss="modal">Close</button> 
                          </div>
                          
                      </div>
                  </div>
              </div>
                </div>      -->
                <!--end modal item details-->


 <!-- edit item modal -->   
     <div class="modal fade" id="editModal">
              <div class="modal-dialog">
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
                        <div class="form-group">
                        <input type="text" class="form-control" name="id1" value="" hidden>
                          <label for="wahProp">Property #</label> 
                          <input type="text" class="form-control" name="wahProp1" value="">
                        </div>
                        <div class="form-group">
                          <label for="type">Organization</label> 
                          <input type="text" class="form-control" name="org1" value="">
                        </div>
                        <div class="form-group">
                          <label for="type">Item Type</label> 
                          <input type="text" class="form-control" name="type1" value="">
                        </div>
                        <div class="form-group">
                        <label for="wahProp">Item Name</label> 
                          <input type="text" class="form-control" name="name1" value="">
                          </div>
                          <div class="form-group">
                          <label for="type">Source</label> 
                          <input type="text" class="form-control" name="source1" value="">
                        </div>
                          <div class="form-group">
                        <label for="wahProp">Date Procured</label> 
                          <input type="text" class="form-control" name="dateProc1" value="">
                          </div>
                          <div class="form-group">
                        <label for="wahProp">Date Acquired</label> 
                          <input type="text" class="form-control" name="dateAcq1" value="">
                          </div>
                          <div class="form-group">
                        <label for="wahProp">Cost</label> 
                          <input type="text" class="form-control" name="cost1" value="">
                          </div>
                          <div class="form-group">
                        <label for="wahProp">Salvage Value</label> 
                          <input type="text" class="form-control" name="salv_val1" value="">
                          </div>
                          <div class="form-group">
                        <label for="wahProp">Life Span</label> 
                          <input type="number" class="form-control" name="life_span1" value="">
                          </div>
                     
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
                                    <input  type="text" name="date_procured" id="date_procured" class="form-control datepicker" data-date-format="yyyy-mm-dd" value="2019-01-01"  required autofocus>
                                   
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="form-control-label" for="date_acquired">{{ __('Date Acquired ') }}</label>
                                <div class="input-group input-group-alternative">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="ni ni-calendar-grid-58"></i></span>
                                    </div>
                                    <input  type="text" name="date_acquired" id="date_acquired" class="form-control datepicker" data-date-format="yyyy-mm-dd" value="2019-01-01"  required autofocus>
                                   
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
                                        <input type="number" name="cost" id="cost" class="form-control form-control-alternative" required>
    
                                       
                                    </div>  

                            <div class="form-group">
                                        <label class="form-control-label" for="salvage_value">{{ __('Salvage Value') }}</label>
                                        <input type="number" name="salvage_value" id="salvage_value" class="form-control form-control-alternative" required>
    
                                       
                                    </div>  

                            <div class="form-group">
                                        <label class="form-control-label" for="life_span">{{ __('Life Span') }}</label>
                                        <input type="number" name="life_span" id="life_span" class="form-control form-control-alternative" required>
    
                                       
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
    });
    </script>
    @endforeach
@endsection
