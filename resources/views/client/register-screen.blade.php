@extends('client.layout')

@section('css')
<link rel="stylesheet" href="{{ asset('css/login.css') }}">
@endsection

@section('body')

    {{-- <div class="fixed h-screen inset-0 z-20 flex items-center justify-center">
        <div class="fixed h-screen inset-0 z-30" id="enter-username-overlay">
        </div>

        <form id="registerform" action="" class="register-form-screen z-40 px-5">
            <div class="form-group !mt-20">
                <input type="text" class="form-control !text-left !text-blue-500 placeholder:text-[#01c0fa] rounded-full" placeholder="Tên tài khoản" name="username" autocomplete="off" required="">
            </div>
            <div class="form-group">
                <input type="text" class="form-control !text-left !text-blue-500 placeholder:text-[#01c0fa] rounded-full" placeholder="Số điện thoại" name="phone" autocomplete="off" required="">
            </div>
            <div class="form-group">
                <input type="password" class="form-control !text-left !text-blue-500 placeholder:text-[#01c0fa] rounded-full" placeholder="Mật khẩu" name="password" autocomplete="off" required="">
            </div>
            <div class="form-group">
                <input type="password" class="form-control !text-left !text-blue-500 placeholder:text-[#01c0fa] rounded-full" placeholder="Xác nhận mật khẩu" name="password_confirmation" autocomplete="off" required="">
            </div>
            <div class="row mb-4">
                <div class="col-md-6 col-6 pr-0">
                    <input type="text" class="form-control text-center !text-blue-500 placeholder:text-[#01c0fa] rounded-full placeholder:font-bold" name="register_code" placeholder="CAPCHA">
                </div>
                <div class="col-md-6 col-6">
                    <label class="col-form-label !border-2 !border-[#01c0fa] rounded-full !bg-[#FFDE21]" id="captcha">1234</label>
                </div>
            </div>

            <div class="form-group">
                <button style="background: #4BE5E4 !important" type="submit" class="btn btn-model-cc py-2 !border-2 !border-white w-full rounded-full text-white"> Đăng ký </button>
            </div>
            
            <div class="q-register !my-5">
                Đã có tài khoản? <a href="{{route('user.login-screen')}}" class="btn-login !text-[#FFDE21]">Đăng nhập</a>
            </div>

            <a href="/" style="background: #4BE5E4 !important" class="btn btn-model-cf py-2 !border-2 !border-white w-full rounded-full text-white">Huỷ thao tác</a>
        </form>
    </div>
     --}}

    <div class="fixed h-screen inset-0 z-20 flex items-center justify-center" id="enter-username-section">
        <div class="fixed h-screen inset-0 z-30" id="enter-username-overlay">
        </div>

        {{-- <form id="enterUsernameForm" action="" class="flex flex-col justify-between w-[430px] h-[288px] z-40 rounded-3xl border-4 border-[#F9DF97] p-5">
            <input type="text" class="form-control !text-left !text-blue-500 placeholder:text-[#01c0fa] !border-2 !border-[#01c0fa] !rounded-full" placeholder="Nhập tên hiển thị" name="displayname" autocomplete="off" required="">
            
            <ul class="text-yellow-300 mt-3 mb-5 text-sm">
                <li>
                    <span>&bull;</span>
                    &nbsp;
                    Ít nhất 6 ký tự, chỉ được đặt một lần
                </li>
                <li>
                    <span>&bull;</span>
                    &nbsp;
                    Tên hiển thị không được trùng với tên đăng nhập
                </li>
            </ul>

            <button style="background: linear-gradient(to right, #00ACE4, #4BE5E4);" type="submit" class="btn btn-model-cc py-2 !border-2 !border-white w-full text-white rounded-full">
                Xác nhận
            </button>
        </form> --}}
        
        <form id="registerSucessForm" action="" class="flex flex-col justify-between w-[430px] h-[288px] z-40 rounded-3xl p-5">
            <h1 class="mt-20 text-white font-bold text-xl text-center
            ">Chúc mừng bạn đã đăng ký thành công</h1>

            <button style="background: linear-gradient(to right, #00ACE4, #4BE5E4);" type="submit" class="btn btn-model-cc py-2 !border-2 !border-white w-full text-white rounded-full">
                Xác nhận
            </button>
        </form>
    </div>
@endsection

@section('js')
<script src="{{ asset('js/login.js').'?v=1.0.0' }}"></script>
@endsection
