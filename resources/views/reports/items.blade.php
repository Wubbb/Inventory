@extends('layouts.app', ['title' => __('Reports')])

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
                                <h3 class="mb-0">{{ __('Items ') }}</h3>
                            </div>
                        </div>
                    </div>
                    <div class="nav-wrapper">
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

                        <div class="col-4 text-right">
                            <a href="/userReports" class="btn btn-sm btn-primary">{{ __('Employee List') }}</a>
                            <a href="/itemsReports " class="btn btn-sm btn-primary">{{ __('Items List') }}</a>
                        </div>

                        <div class="card mb-3">
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table align-items-center table-flush table-dark" id="dataTable">
                                        <thead class="thead-light">
                                        <tr>
                                            <th scope="col">{{__('Property#')}}</th>
                                            <th scope="col">{{ __('Organization') }}</th>
                                            <th scope="col">{{ __('Type') }}</th>
                                            <th scope="col">{{ __('Item Name') }}</th>
                                            <th scope="col">{{ __('Source') }}</th>
                                            <th scope="col">{{ __('Date Procured') }}</th>
                                            <th scope="col">{{ __('Date Acquired') }}</th>
                                            <th scope="col">{{ __('Cost') }}</th>
                                            <th scope="col">{{ __('Salvage Value') }}</th>
                                            <th scope="col">{{ __('Life Span') }}</th>
                                            <th scope="col">{{ __('Age') }}</th>
                                            <th scope="col">{{ __('Disposed Date') }}</th>
                                            <th scope="col">{{ __('Disposed Method') }}</th>
                                            <th scope="col">{{ __('Remarks') }}</th>
                                            <th scope="col">{{ __('Location') }}</th>

                                        </tr>
                                        </thead>
                                        <tbody>
                                        @forelse ($items as $item)
                                            <tr>
                                                <td>{{$item->prop_no}}</td>
                                                <td>{{$item->org}}</td>
                                                <td>{{$item->type}}</td>
                                                <td>{{$item->item_name}}</td>
                                                <td>{{$item->source}}</td>
                                                <td>{{ \Carbon\Carbon::parse($item->date_procured)->diffForHumans()}}</td>
                                                <td>{{ \Carbon\Carbon::parse($item->date_acquired)->diffForHumans()}}</td>
                                                <td>{{$item->cost}}</td>
                                                <td>{{$item->salvage_value}}</td>
                                                <td>{{$item->life_span}}</td>
                                                <td>{{$item->age}}</td>
                                                <td>{{\Carbon\Carbon::parse($item->disposed_date)->diffForHumans()}}</td>
                                                <td>{{$item->disposed_method}}</td>
                                                <td>{{$item->remarks}}</td>
                                                <td>{{$item->location}}</td>
{{--                                                <td>{{ \Carbon\Carbon::parse($item->created_at)->diffForHumans() }}</td>--}}

                                            </tr>
                                        @empty <tr><td>No records found</td></tr>
                                        @endforelse
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @include('layouts.footers.auth')
        <script>
            window.setTimeout(function() {
                $(".alert").fadeTo(400, 0).slideUp(400, function(){
                    $(this).remove();
                });
            }, 4000);
        </script>
@endsection
