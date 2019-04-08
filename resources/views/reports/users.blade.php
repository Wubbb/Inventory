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
                                <h3 class="mb-0">{{ __('Employee') }}</h3>
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
                                    <table class="table align-items-center table-flush table-dark"  id="dataTable">
                                        <thead class="thead-light">
                                        <tr>
                                            <th scope="col">{{__('Employee#')}}</th>
                                            <th scope="col">{{ __('Name') }}</th>
                                            <th scope="col">{{ __('Username') }}</th>
                                            <th scope="col">{{ __('Designation') }}</th>
                                            <th scope="col">{{ __('Active') }}</th>
                                            <th scope="col">{{ __('Date Created') }}</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @forelse ($users as $user)
                                            <tr>
                                                <td>Papalit ng employee_no ung sa migration</td>
                                                <td>{{$user->name}}</td>
                                                <td>{{$user->username}}</td>
                                                <td>{{$user->designation}}</td>
                                                <td>{{$user->active}}</td>
                                                <td>{{ \Carbon\Carbon::parse($user->created_at)->diffForHumans() }}</td>

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
