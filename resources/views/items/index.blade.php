@extends('layouts.app', ['title' => __('Items')])

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
                            <div class="col-4 text-right">
                                <a href="{{ route('items.index') }}" class="btn btn-sm btn-primary" data-toggle="modal" data-target="#modal-addItem">{{ __('Add Item') }}</a>
                            </div>
                        </div>
                    </div>
                    
                    <div class="col-12">
                        @if (session('status'))
                            <div class="alert alert-success alert-dismissible fade show" role="alert">
                                <span class="alert-inner--icon"><i class="ni ni-like-2"></i></span>
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
                                    <table class="table align-items-center table-flush table-dark" id="dataTable">
                                            <thead class="thead-dark">
                                                <tr>
                                                    <th scope="col">{{__('Wah Property #')}}</th>
                                                    <th scope="col">{{ __('Type') }}</th>
                                                    <th scope="col">{{ __('Details') }}</th>
                                                    <!-- <th scope="col">{{ __('Date Procured') }}</th>
                                                    <th scope="col">{{ __('Method') }}</th>
                                                    <th scope="col">{{ __('From') }}</th>
                                                    <th scope="col">{{ __('Cost') }}</th>
                                                    <th scope="col">{{ __('Depreciation Value') }}</th>
                                                    <th scope="col">{{ __('Assigned To') }}</th>-->
                                                    <th scope="col">{{__('Action')}}</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($items as $item)
                                                    <tr>
                                                         <td>{{$item->wahProp}}</td>
                                                         <td>{{$item->type}}</td>
                                                         <td>{{$item->details}}</td>
                                                         <!-- <td>{{$item->dateProc}}</td>
                                                         <td>{{$item->method}}</td>
                                                         <td>{{$item->from}}</td>
                                                         <td>{{$item->cost}}</td>
                                                         <td>{{$item->depre}}</td>
                                                         <td>{{$item->assignTo}}</td> -->

                                                         <td> <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#modal-default"
                                                         data-mywah="{{$item->wahProp}}" data-mytype="{{$item->type}}" data-mydetail="{{$item->details}}"
                                                         data-mydate="{{$item->dateProc}}" data-mymethod="{{$item->method}}" data-myfrom="{{$item->from}}"
                                                         data-mycost="{{$item->cost}}" data-mydepre="{{$item->depre}}" data-myassignto="{{$item->name}}">View </button>
                                                         <button type="button" class="btn btn-success btn-sm" data-toggle="modal" data-target="#editModal"
                                                         data-id="{{$item->id}}" data-mywah="{{$item->wahProp}}" data-mytype="{{$item->type}}" data-mydetail="{{$item->details}}"
                                                         data-mydate="{{$item->dateProc}}" data-mymethod="{{$item->method}}" data-myfrom="{{$item->from}}" data-myemploy="{{$item->name}}"
                                                         data-mycost="{{$item->cost}}" data-mydepre="{{$item->depre}}" data-myassignto="{{$item->assignTo}}">Edit</button>
                                                            @csrf
                                                            @method("DELETE")
                                                            <button type="button" class="btn btn-danger btn-sm" name="submit" value="Delete">Delete</button>
                                                            <!-- <input type="submit" name="submit" value="Delete"> -->
                                                         </td>
                                                         <!--  -->
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
        <div class="row">
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
                              <button type="button" class="btn btn-primary">Save changes</button>
                              <button type="button" class="btn btn-link  ml-auto" data-dismiss="modal">Close</button> 
                          </div>
                          
                      </div>
                  </div>
              </div>
                </div>     
                <!--end modal item details-->


 <!-- edit item modal -->   
     <div class="modal fade" id="editModal">
              <div class="modal-dialog">
                <div class="modal-content">
                  <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" align="center"><b>Edit Item</b></h4>
                  </div>
                  <div class="modal-body">
                    <form role="form" action="{{route('items.update','test')}}" method="post">
                    {{method_field('patch')}}
                    @csrf
                    <div class="box-body">
                        <div class="form-group">
                        <input type="text" class="form-control" name="id" placeholder="id" value="" hidden>
                          <label for="wahProp">Wah Property #</label> 
                          <input type="text" class="form-control" name="wahProp" placeholder="Wah Property #" value="">
                        </div>
                        <div class="form-group">
                          <label for="type">Type</label> 
                          <input type="text" class="form-control" name="type" placeholder="Type" value="">
                        </div>
                        <div class="form-group">
                        <label for="wahProp">Details</label> 
                          <input type="text" class="form-control" name="details" placeholder="Details" value="">
                          </div>
                          <div class="form-group">
                        <label for="wahProp">Date Procured</label> 
                          <input type="text" class="form-control" name="dateProc" placeholder="Date Procured" value="">
                          </div>
                          <div class="form-group">
                        <label for="wahProp">Method</label> 
                          <input type="text" class="form-control" name="method" placeholder="Method" value="">
                          </div>
                          <div class="form-group">
                        <label for="wahProp">From</label> 
                          <input type="text" class="form-control" name="from" placeholder="From" value="">
                          </div>
                          <div class="form-group">
                        <label for="wahProp">Cost</label> 
                          <input type="text" class="form-control" name="cost" placeholder="Cost" value="">
                          </div>
                          <div class="form-group">
                        <label for="wahProp">Depreciation Value</label> 
                          <input type="text" class="form-control" name="depre" placeholder="Depreciation Value" value="">
                          </div>
                          <div class="form-group">
                        <label for="wahProp">Assign To</label>  
                                <select class="form-control" name="assignTo">
                                    <option value="0" id="assignTo">Select Employee</option>
                                        @foreach ($employee as $employees)  
                                        <option value="{{$employees->id}}" id="assignTo">{{$employees->name}}</option>
                                        @endforeach
                                </select>                     
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
                                <div class="form-group{{ $errors->has('wahProp') ? ' has-danger' : '' }}">
                                    <label class="form-control-label" for="wahProp">{{ __('Wah Property #') }}</label>
                                    <input type="text" name="wahProp" id="wahProp" class="form-control form-control-alternative{{ $errors->has('wahProp') ? ' is-invalid' : '' }}" placeholder="{{ __('Wah Property #') }}" value="{{ old('wahProp') }}" required autofocus>

                                    @if ($errors->has('wahProp'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('wahProp') }}</strong>
                                        </span>
                                    @endif
                                </div>
                                <div class="form-group{{ $errors->has('type') ? ' has-danger' : '' }}">
                                    <label class="form-control-label" for="type">{{ __('Type') }}</label>
                                    <input type="text" name="type" id="type" class="form-control form-control-alternative{{ $errors->has('type') ? ' is-invalid' : '' }}" placeholder="{{ __('Type') }}" value="{{ old('type') }}" required>

                                    @if ($errors->has('type'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('type') }}</strong>
                                        </span>
                                    @endif
                                </div>
                                
                                <div class="form-group{{ $errors->has('details') ? ' has-danger' : '' }}">
                                        <label class="form-control-label" for="details">{{ __('Details') }}</label>
                                       
                                         
                                                                  
                                        <input type="text" name="details" id="details" class="form-control form-control-alternative{{ $errors->has('details') ? ' is-invalid' : '' }}" placeholder="{{ __('Details') }}" value="{{ old('details') }}" required>
    
                                        @if ($errors->has('details'))
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $errors->first('details') }}</strong>
                                            </span>
                                        @endif

                                        
                                    </div>

                            </div>

                            <div class="pl-lg-4">
                                <div class="form-group{{ $errors->has('dateProc') ? ' has-danger' : '' }}">
                                    <label class="form-control-label" for="dateProc">{{ __('Date Procured ') }}</label>
                                    <input type="text" name="dateProc" id="dateProc" class="form-control form-control-alternative{{ $errors->has('dateProc') ? ' is-invalid' : '' }}" placeholder="{{ __('Date Procured') }}" value="{{ old('dateProc') }}" required autofocus>

                                    @if ($errors->has('dateProc'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('dateProc') }}</strong>
                                        </span>
                                    @endif
                                </div>

                            <div class="form-group{{ $errors->has('method') ? ' has-danger' : '' }}">
                                        <label class="form-control-label" for="method">{{ __('Method') }}</label>
                                        <input type="text" name="method" id="method" class="form-control form-control-alternative{{ $errors->has('method') ? ' is-invalid' : '' }}" placeholder="{{ __('Method') }}" value="{{ old('method') }}" required>
    
                                        @if ($errors->has('method'))
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $errors->first('method') }}</strong>
                                            </span>
                                        @endif
                                    </div>

                            <div class="form-group{{ $errors->has('from') ? ' has-danger' : '' }}">
                                        <label class="form-control-label" for="method">{{ __('From') }}</label>
                                        <input type="text" name="from" id="from" class="form-control form-control-alternative{{ $errors->has('from') ? ' is-invalid' : '' }}" placeholder="{{ __('From') }}" value="{{ old('from') }}" required>
    
                                        @if ($errors->has('method'))
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $errors->first('from') }}</strong>
                                            </span>
                                        @endif
                                    </div> 

                            <div class="form-group{{ $errors->has('cost') ? ' has-danger' : '' }}">
                                        <label class="form-control-label" for="cost">{{ __('Cost') }}</label>
                                        <input type="text" name="cost" id="cost" class="form-control form-control-alternative{{ $errors->has('cost') ? ' is-invalid' : '' }}" placeholder="{{ __('Cost') }}" value="{{ old('cost') }}" required>
    
                                        @if ($errors->has('cost'))
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $errors->first('cost') }}</strong>
                                            </span>
                                        @endif
                                    </div>  

                            <div class="form-group{{ $errors->has('assignTo') ? ' has-danger' : '' }}">
                                <label class="form-control-label" for="assignTo">{{ __('Assign To') }}</label>
                                <select class="form-control" name="assignTo">
                                    <option value="0" id="assignTo">Select Employee</option>
                                        @foreach ($employee as $employees)  
                                        <option value="{{$employees->id}}" id="assignTo">{{$employees->name}}</option>
                                        @endforeach
                                         </select>   
                                        @if ($errors->has('assignTo'))
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $errors->first('assignTo') }}</strong>
                                            </span>
                                        @endif
                                </select>
                            </div>

                            <!--<div class="form-group{{ $errors->has('assignTo') ? ' has-danger' : '' }}">
                                        <label class="form-control-label" for="assignTo">{{ __('Assign To') }}</label>
                                         <input type="text" name="assignTo" id="assignTo" class="form-control form-control-alternative{{ $errors->has('assignTo') ? ' is-invalid' : '' }}" placeholder="{{ __('Assign To') }}" value="{{ old('assignTo') }}" required>
     
                                        <select name="assignTo">
                                        <option value="0" id="assignTo">None</option>
                                        @foreach ($employee as $employees)  
                                        <option value="{{$employees->id}}" id="assignTo">{{$employees->name}}</option>
                                        @endforeach
                                         </select>   
                                        @if ($errors->has('assignTo'))
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $errors->first('assignTo') }}</strong>
                                            </span>
                                        @endif
                                    </div>  --> 


                            <div class="form-group{{ $errors->has('depre') ? ' has-danger' : '' }}">
                                        <label class="form-control-label" for="assignTo">{{ __('Depreciation') }}</label>
                                        <input type="text" name="depre" id="depre" class="form-control form-control-alternative{{ $errors->has('depre') ? ' is-invalid' : '' }}" placeholder="{{ __('Depreciation') }}" value="{{ old('depre') }}" required>
    
                                        @if ($errors->has('depre'))
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $errors->first('depre') }}</strong>
                                            </span>
                                        @endif
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
  <!--end add item modal-->  
                 
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