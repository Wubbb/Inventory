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
                                <h3 class="mb-0">{{ __('HCI Computers') }}</h3>
                            </div>
                            <div class="col-4 text-right" >
                                <button id="add" type="button" class="btn btn-sm btn-primary" data-toggle="modal"
                                data-target="#modal-addComputer">{{ __('Add Computer') }}</button>
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
            <td><input type="text" class="form-control" id="min2" name="min2" style="border-radius:3px;border:1px solid #cad1d7;height:30px; width:90%"></td>
        
            <td>Maximum age:</td>
            <td><input type="text" class="form-control" id="max2" name="max2" style="border-radius:3px;border:1px solid #cad1d7;height:30px; width:90%"></td>
        </tr>
    </tbody></table>
    <br>
                    <div class="card mb-3">
                            <div class="card-body">
                              <div class="table-responsive">
                                    <table class="table align-items-center table-flush table-dark table-advance" id="rhucomputer">
                                            <thead class="thead-dark">
                                                <tr>
                                                    <th scope="col">{{__('Municipality')}}</th>
                                                    <th scope="col">{{ __('RHU') }}</th>
                                                    <th scope="col">{{ __('Owned By:') }}</th>
                                                    <th scope="col">{{__('Property Number')}}</th>
                                                    <th scope="col">{{__('Type')}}</th>
                                                    <th scope="col">{{__('Specification')}}</th>
                                                    <th scope="col">{{__('RAM')}}</th>
                                                    <th scope="col">{{__('HDD Memory')}}</th>
                                                    <th scope="col">{{__('Operating System')}}</th>
                                                    <th scope="col">{{__('Location')}}</th>
                                                    <th scope="col">{{__('Status')}}</th>
                                                    <th scope="col">{{__('WAH Adoption')}}</th>
                                                    <th scope="col">{{__('Date Acquired')}}</th>
                                                    <th scope="col">{{__('Age')}}</th>
                                                    <th scope="col">{{__('Action')}}</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($computers as $computer)
                                                    <tr>
                                                         <td>{{$computer->municipality}}</td>
                                                         <td>{{$computer->rhu}}</td>
                                                         <td>{{$computer->owned_by}}</td>
                                                         <td>{{$computer->property_no}}</td>
                                                         <td>{{$computer->type}}</td>
                                                         <td>{{$computer->spec}}</td>
                                                         <td>{{$computer->ram}}</td>
                                                         <td>{{$computer->hdd}}</td>
                                                         <td>{{$computer->os}}</td>
                                                         <td>{{$computer->location}}</td>
                                                         <td>{{$computer->status}}</td>
                                                         <td>{{$computer->wah_adoption}}</td>
                                                         <td>{{$computer->date_acquired}}</td>
                                                         <td>
                                                         @php
                                                         $date = $computer->date_acquired;
                                                         $years = \Carbon\Carbon::parse($date)->diff(\Carbon\Carbon::now())->format('%y years, %m months and %d days');
                                                         $age = \Carbon\Carbon::parse($date)->age;
                                                            
                                                            echo $years;

                                                         @endphp
                                                         </td>
                                                         

                                                         <td>
                                                                 <button type="button" class="btn btn-success btn-sm" data-toggle="modal" data-target="#editModalComp"
                                                                  data-myid="{{$computer->id}}"
                                                                  data-mymunicipality="{{$computer->municipality}}"
                                                                  data-myrhu="{{$computer->rhu}}"
                                                                  data-myowned_by="{{$computer->owned_by}}"
                                                                  data-myproperty_no="{{$computer->property_no}}"
                                                                  data-mytype="{{$computer->type}}"
                                                                  data-myspec="{{$computer->spec}}"
                                                                  data-myram="{{$computer->ram}}"
                                                                  data-myhdd="{{$computer->hdd}}"
                                                                  data-myos="{{$computer->os}}"
                                                                  data-mylocation="{{$computer->location}}"
                                                                  data-mystatus="{{$computer->status}}"
                                                                  data-mywah_adoption="{{$computer->wah_adoption}}"
                                                                  data-mydate_acquired="{{$computer->date_acquired}}">
                                                                     Edit Computer</button>

                                                                <button type="button" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#modal-delComputer"
                                                                data-myid2="{{$computer->id}}">Delete Computer</button>
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

 <!-- edit computer modal --> 
 <div class="row">
  <div class="col-md-4">
  <div class="modal fade" id="editModalComp" tabindex="-1" role="dialog" aria-labelledby="modal-default" aria-hidden="true">
    <div class="modal-dialog modal- modal-dialog-centered modal-md" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h2 class="modal-title" id="modal-title-default">Edit Computer Details:</h2>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
                  <div class="modal-body">
                    <form role="form" action="{{route('hcicomputers.update','comp')}}" method="post">
                    {{method_field('patch')}}
                    @csrf
                    <div class="pl-lg-4">
                                <div class="form-group">
                                <input type="text" name="id1" id="id1" class="form-control form-control-alternative"  hidden>
                                    <label class="form-control-label" for="municipality1">{{ __('Municipality') }}</label>
                                    <input type="text" name="municipality1" id="municipality1" class="form-control form-control-alternative" >
                                </div>

                                <div class="form-group">
                                    <label class="form-control-label" for="rhu1">{{ __('RHU') }}</label>
                                    <input type="text" name="rhu1" id="rhu1" class="form-control form-control-alternative"  >
                                </div>

                                <div class="form-group">
                                    <label class="form-control-label" for="owned_by1">{{ __('Owned By') }}</label>
                                    <input type="text" name="owned_by1" id="owned_by1" class="form-control form-control-alternative"  >
                                </div>
                                
                                <div class="form-group">
                                    <label class="form-control-label" for="property_no1">{{ __('Property Number') }}</label>
                                    <input type="text" name="property_no1" id="property_no1" class="form-control form-control-alternative"  >
                                </div>

                                <div class="form-group">
                                    <label class="form-control-label" for="type1">{{ __('Type') }}</label>
                                    <input type="text" name="type1" id="type1" class="form-control form-control-alternative"  >
                                </div>

                                <div class="form-group">
                                    <label class="form-control-label" for="spec1">{{ __('Specification') }}</label>
                                    <input type="text" name="spec1" id="spec1" class="form-control form-control-alternative"  >
                                </div>
                                
                                <div class="form-group">
                                    <label class="form-control-label" for="ram1">{{ __('RAM') }}</label>
                                    <input type="text" name="ram1" id="ram1" class="form-control form-control-alternative"  >
                                </div>

                                <div class="form-group">
                                    <label class="form-control-label" for="hdd1">{{ __('HDD Memory') }}</label>
                                    <input type="text" name="hdd1" id="hdd1" class="form-control form-control-alternative"  >
                                </div>

                                <div class="form-group">
                                    <label class="form-control-label" for="os1">{{ __('Operating System') }}</label>
                                    <input type="text" name="os1" id="os1" class="form-control form-control-alternative"  >
                                </div>

                                <div class="form-group">
                                    <label class="form-control-label" for="location1">{{ __('Location') }}</label>
                                    <input type="text" name="location1" id="location1" class="form-control form-control-alternative"  >
                                </div>

                                <div class="form-group">
                                        <label class="form-control-label" for="status1">{{ __('Status') }}</label>
                                        <select class="form-control form-control-alternative" name="status1">
                                            <option value="Functioning">Functioning</option>
                                            <option value="Not Functioning">Not Functioning</option>
                                        </select>

                                        
                                    </div>

                            <div class="form-group">
                                <label class="form-control-label" for="wah_adoption1">{{ __('WAH Adoption ') }}</label>
                                <div class="input-group input-group-alternative">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="ni ni-calendar-grid-58"></i></span>
                                    </div>
                                    <input  type="date" name="wah_adoption1" id="wah_adoption1" class="form-control"  autofocus>
                                   
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="form-control-label" for="date_acquired1">{{ __('Date Acquired ') }}</label>
                                <div class="input-group input-group-alternative">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="ni ni-calendar-grid-58"></i></span>
                                    </div>
                                    <input  type="date" name="date_acquired1" id="date_acquired1" class="form-control" autofocus>
                                   
                                </div>
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
           </div> 
</div>
    <!-- edit computer modal end -->


    
<!--add computer modal-->
<div class="row">
  <div class="col-md-4">
      <div class="modal fade" id="modal-addComputer" tabindex="-1" role="dialog" aria-labelledby="modal-default" aria-hidden="true">
    <div class="modal-dialog modal- modal-dialog-centered modal-" role="document">
        <div class="modal-content">

            <div class="modal-header">
                <h2 class="modal-title" id="modal-title-default">Add Computer Details:</h2>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>

            <div class="modal-body">
                        <form method="post" action="{{ route('hcicomputers.store') }}" autocomplete="off">
                            @csrf
                            
                            <div class="pl-lg-4">
                                <div class="form-group">
                                    <label class="form-control-label" for="municipality">{{ __('Municipality') }}</label>
                                    <input type="text" name="municipality" id="municipality" class="form-control form-control-alternative" >
                                </div>

                                <div class="form-group">
                                    <label class="form-control-label" for="rhu">{{ __('RHU') }}</label>
                                    <input type="text" name="rhu" id="rhu" class="form-control form-control-alternative" >
                                </div>

                                <div class="form-group">
                                    <label class="form-control-label" for="owned_by">{{ __('Owned By') }}</label>
                                    <input type="text" name="owned_by" id="owned_by" class="form-control form-control-alternative" >
                                </div>
                                
                                <div class="form-group">
                                    <label class="form-control-label" for="property_no">{{ __('Property Number') }}</label>
                                    <input type="text" name="property_no" id="property_no" class="form-control form-control-alternative" >
                                </div>

                                <div class="form-group">
                                    <label class="form-control-label" for="type">{{ __('Type') }}</label>
                                    <input type="text" name="type" id="type" class="form-control form-control-alternative" >
                                </div>

                                <div class="form-group">
                                    <label class="form-control-label" for="spec">{{ __('Specification') }}</label>
                                    <input type="text" name="spec" id="spec" class="form-control form-control-alternative" >
                                </div>
                                
                                <div class="form-group">
                                    <label class="form-control-label" for="ram">{{ __('RAM') }}</label>
                                    <input type="text" name="ram" id="ram" class="form-control form-control-alternative" >
                                </div>

                                <div class="form-group">
                                    <label class="form-control-label" for="hdd">{{ __('HDD Memory') }}</label>
                                    <input type="text" name="hdd" id="hdd" class="form-control form-control-alternative" >
                                </div>

                                <div class="form-group">
                                    <label class="form-control-label" for="os">{{ __('Operating System') }}</label>
                                    <input type="text" name="os" id="os" class="form-control form-control-alternative" >
                                </div>

                                <div class="form-group">
                                    <label class="form-control-label" for="location">{{ __('Location') }}</label>
                                    <input type="text" name="location" id="location" class="form-control form-control-alternative" >
                                </div>

                                <div class="form-group">
                                        <label class="form-control-label" for="status">{{ __('Status') }}</label>
                                        <select class="form-control form-control-alternative" name="status">
                                            <option value="Functioning">Functioning</option>
                                            <option value="Not Functioning">Not Functioning</option>
                                        </select>

                                        
                                    </div>

                            <div class="form-group">
                                <label class="form-control-label" for="wah_adoption">{{ __('WAH Adoption ') }}</label>
                                <div class="input-group input-group-alternative">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="ni ni-calendar-grid-58"></i></span>
                                    </div>
                                    <input  type="date" name="wah_adoption" id="wah_adoption" class="form-control"  autofocus>
                                   
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="form-control-label" for="date_acquired">{{ __('Date Acquired ') }}</label>
                                <div class="input-group input-group-alternative">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="ni ni-calendar-grid-58"></i></span>
                                    </div>
                                    <input  type="date" name="date_acquired" id="date_acquired" class="form-control" autofocus>
                                   
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
                                        
                            <div class="modal-footer">
                <button type="submit" class="btn btn-success mt-4">{{ __('Add Computer') }}</button>
                <button type="button" class="btn btn-link  ml-auto" data-dismiss="modal">Close</button>
            </div>
                        </form>
            </div>
            </div>

        </div>
    </div>
</div>
</div>
  <!--end add computer modal-->  
  <!-- delete computer modal -->
  <div class="row">
  <div class="col-md-4">
      <div class="modal fade" id="modal-delComputer" tabindex="-1" role="dialog" aria-labelledby="modal-default" aria-hidden="true">
    <div class="modal-dialog modal- modal-dialog-centered modal-" role="document">
        <div class="modal-content">

            <div class="modal-header">
                <h2 class="modal-title" id="modal-title-default">Delete Computer Details?</h2>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <form action="{{route('hcicomputers.destroy','del')}}" method="post">
            @csrf
            @method("DELETE")
            <input type="text" name="id2" hidden>
            <div class="modal-footer">
                        <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Cancel</button>
                        <button type="submit" class="btn btn-success">Confirm</button>
                      </div>
                </form>
            </div>
            </div>

        </div>
    </div>
</div>
  <!-- end delete computer modat -->
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
    <script>
    $('#editModalComp').on('show.bs.modal', function (event){
            var button = $(event.relatedTarget);
            var id = button.attr('data-myid');
            var municipality = button.attr('data-mymunicipality');
            var rhu = button.attr('data-myrhu');
            var owned_by = button.attr('data-myowned_by');
            var property_no = button.attr('data-myproperty_no');
            var type = button.attr('data-mytype');
            var spec = button.attr('data-myspec');
            var ram = button.attr('data-myram');
            var hdd = button.attr('data-myhdd');
            var os = button.attr('data-myos');
            var location = button.attr('data-mylocation');
            var status = button.attr('data-mystatus');
            var wah_adoption = button.attr('data-mywah_adoption');
            var date_acquired = button.attr('data-mydate_acquired');
            var modal=$(this);

            $('input[name=id1]').val(id);
            $('input[name=municipality1]').val(municipality);
            $('input[name=rhu1]').val(rhu);
            $('input[name=owned_by1]').val(owned_by);
            $('input[name=property_no1]').val(property_no);
            $('input[name=type1]').val(type);
            $('input[name=spec1]').val(spec);
            $('input[name=ram1]').val(ram);
            $('input[name=hdd1]').val(hdd);
            $('input[name=os1]').val(os);
            $('input[name=location1]').val(location);
            $('select[name=status1]').val(status);
            $('input[name=wah_adoption1]').val(wah_adoption);
            $('input[name=date_acquired1]').val(date_acquired);

        });

        $('#modal-delComputer').on('show.bs.modal', function (event){
            var button = $(event.relatedTarget);
            var id2 = button.attr('data-myid2');
            var modal=$(this);

            $('input[name=id2]').val(id2);
        });
    </script>
@endsection
