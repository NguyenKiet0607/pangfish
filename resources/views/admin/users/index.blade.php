@extends('layouts.app')

@section('title', __('layouts.users.title'))

@section('content_header')
    <h1><i class="fa fa-fw fa-users"></i> {{ __('layouts.users.title') }}</h1>
@stop

@section('content')
    <!-- Main content -->
    @if ($message = Session::get('success'))
        <div class="alert alert-success alert-dismissible">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
            {{ __($message)}}
        </div>
    @elseif($message = Session::get('error'))
        <div class="alert alert-danger alert-dismissible">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
            {{ __($message)}}
        </div>
    @endif
    <div class="card card-outline card-success">
        <div class="card-header">
            <h3 class="card-title">{{ __('layouts.users.title_search') }}</h3>

            <div class="card-tools">
                <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i></button>
            </div>
        </div>
        <!-- /.card-header -->
        <div class="card-body">
            <form method="GET" id="form-admin-search" action="{{ route('users.index') }}">
                <div class="row">
                    <div class="col-md-4">
                        <div class="form-group row">
                            <div class="col-sm-12">
                                <input type="text" class="form-control" value="{{ $request->name }}" id="name" name="name" placeholder="{{ __('layouts.users.placeholder_search') }}">
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group row">
                            <div class="col-sm-8">
                                <button class="btn btn-default btn-search"><i class="fa fa-search"></i> {{ __('layouts.btn_search') }}</button>
                                <a class="btn btn-primary" href="{{ route('users.create') }}"><i class="fa fa-plus"></i> {{ __('layouts.btn_create') }}</a>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <div class="table-responsive">
                        <table id="datatable" class="table table-bordered table-hover display nowrap" data-url="{{ route('users.index', $request->all()) }}">
                            <thead>
                            <tr>
                                <th>ID</th>
                                <th>{{ __("layouts.users.username") }}</th>
                                <th>{{ __("layouts.users.name") }}</th>
                                <th>{{ __("layouts.users.coin") }}</th>
                                <th>{{ __("layouts.users.total_credit") }}</th>
                                <th>{{ __("layouts.users.phone") }}</th>
                                <th>{{ __("layouts.users.last_login") }}</th>
                                <th>{{ __("layouts.users.ip") }}</th>
                                <th>{{ __("layouts.users.active") }}</th>
                                <th></th>
                            </tr>
                            </thead>
                        </table>
                    </div>
                </div>
                <!-- /.card-body -->
            </div>
            <!-- /.card -->
            @include('admin.components.add_credit')
        </div>
    </div>
@endsection

@section('js')
    <script src="{{ asset('js/users.js').'?v='.env('VERSION', '1.0.0') }}"></script>
@endsection

