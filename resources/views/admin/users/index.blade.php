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
                                <input type="date" class="form-control" id="startDate" name="start_date" value="{{ $request->start_date }}" placeholder="dd/mm/yyyy">
                            </div>
                            <div class="col-4">
                                <input type="date" class="form-control" id="endDate" name="end_date" value="{{ $request->end_date }}" placeholder="dd/mm/yyyy">
                            </div>           
                        </div>
                    </div>

                    {{-- Buttons --}}
                    <div class="col-6">
                        <div class="form-group row">
                            <div>
                                <button style="min-width: 110px;" class="btn-clear-filter btn btn-default btn-search">
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
                                <input type="number" class="form-control" id="startId" name="start_id" value="{{ $request->start_id }}" placeholder="ID bắt đầu">
                            </div>
                            <div class="col-4">
                                <input type="number" class="form-control" id="endId" name="end_id" value="{{ $request->end_id }}" placeholder="ID kết thúc">
                            </div>            
                        </div>
                    </div>

                    {{-- Buttons --}}
                    <div class="col-6" style="padding: 0">
                        <div style="width: 100%" class="d-flex align-items-center justify-content-between">
                            <button id="export-excel-btn" type="button" style="min-width: 110px;" class="btn btn-default btn-search">
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

                <div class="row mt-3">
                    <div class="col-6">
                        <button style="min-width: 110px; width: 100%;" class="btn btn-primary">
                            Lọc
                        </button>
                    </div>
                    <div class="col-6">

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

    <script src="https://cdnjs.cloudflare.com/ajax/libs/xlsx/0.18.5/xlsx.full.min.js"></script>

    <script>
        const exportExcelBtn = document.getElementById('export-excel-btn');
    
        exportExcelBtn.addEventListener('click', () => {
            // Lấy các giá trị từ input
            const startId = document.getElementById('startId').value;
            const endId = document.getElementById('endId').value;
            const startDate = document.getElementById('startDate').value;
            const endDate = document.getElementById('endDate').value;
    
            // Format ngày hiện tại
            const today = new Date();
            const currentDate = formatDate(today);
    
            // Tạo mảng các phần tử của tên file
            let fileNameParts = ['user'];
    
            // Thêm phần ID nếu có
            if (startId) {
                fileNameParts.push(startId);
               
            }

            if (endId) {
                fileNameParts.push(endId);
            }
    
            // Thêm phần ngày nếu có
            if (startDate ) {
                fileNameParts.push(formatDate(new Date(startDate)));
            }
            
            if (endDate) {

                fileNameParts.push(formatDate(new Date(endDate)));
            }
    
            // Luôn thêm ngày hiện tại
            fileNameParts.push(currentDate);
    
            // Nối các phần tử lại với nhau bằng dấu _
            const fileName = fileNameParts.join('_');
    
            exportTableToExcel('datatable', fileName);
        });
    
        // Hàm format ngày sang dạng ddMMyyyy
        function formatDate(date) {
            const day = String(date.getDate()).padStart(2, '0');
            const month = String(date.getMonth() + 1).padStart(2, '0');
            const year = date.getFullYear();
            return `${day}${month}${year}`;
        }
    
        function exportTableToExcel(tableID, filename = '') {
            // Get the HTML table element
            const table = document.getElementById(tableID);
            const rows = Array.from(table.rows);
    
            // Prepare data array excluding the last two columns of each row
            const data = rows.map(row => 
                Array.from(row.cells).slice(0, -2).map(cell => cell.innerText)
            );
    
            // Convert data array to worksheet
            const worksheet = XLSX.utils.aoa_to_sheet(data);
    
            // Create a new workbook and append the worksheet
            const workbook = XLSX.utils.book_new();
            XLSX.utils.book_append_sheet(workbook, worksheet, "Sheet1");
    
            // Thêm .xlsx vào tên file
            filename = filename + '.xlsx';
    
            // Write file and trigger download
            XLSX.writeFile(workbook, filename);
        }
    </script>
@endsection