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
                    {{-- Inputs --}}
                    <div class="col-6">
                        <div>
                            <input type="text" class="form-control" value="{{ $request->name }}" id="name" name="name" placeholder="{{ __('layouts.users.placeholder_search') }}">
                        </div>
                    </div>

                    {{-- Buttons --}}
                    <div class="col-6">
                        <div class="form-group row">
                            <div style="width: 100%" class="d-flex align-items-center justify-content-between">
                                <button class="btn btn-default btn-search"><i class="fa fa-search"></i> {{ __('layouts.btn_search') }}</button>
                                <a class="btn btn-primary" href="{{ route('users.create') }}"><i class="fa fa-plus"></i> {{ __('layouts.btn_create') }}</a>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row mt-5">
                    {{-- Inputs --}}
                    <div class="col-6">
                        <div class="row">
                            <div class="col-4">
                                <label for="startDate" class="form-label">Ngày đăng ký:</label>
                            </div>
                            <div class="col-4">
                                <input type="date" class="form-control" id="startDate" placeholder="dd/mm/yyyy">
                            </div>
                            <div class="col-4">
                                <input type="date" class="form-control" id="endDate" placeholder="dd/mm/yyyy">
                            </div>            
                        </div>
                    </div>

                    {{-- Buttons --}}
                    <div class="col-6">
                        <div class="form-group row">
                            <div>
                                <button style="min-width: 110px;" class="btn btn-default btn-search">
                                    Xóa bộ lọc
                                </button>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row">
                    {{-- Inputs --}}
                    <div class="col-6">
                        <div class="row">
                            <div class="col-4">
                                <label for="startDate" class="form-label">Id bắt đầu:</label>
                            </div>
                            <div class="col-4">
                                <input type="text" class="form-control" id="startId" placeholder="ID bắt đầu">
                            </div>
                            <div class="col-4">
                                <input type="text" class="form-control" id="endId" placeholder="ID kết thúc">
                            </div>            
                        </div>
                    </div>

                    {{-- Buttons --}}
                    <div class="col-6" style="padding: 0">
                        <div style="width: 100%" class="d-flex align-items-center justify-content-between">
                            <button style="min-width: 110px;" class="btn btn-default btn-search">
                                Tải excel
                            </button>
                            <div class="d-flex align-items-center">
                                <input type="text" class="form-control" placeholder="Nhập số trang">

                                <button style="min-width: 110px; margin-left: 5px;" class="btn btn-primary btn-search">
                                    Đi đến trang
                                </button>
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

