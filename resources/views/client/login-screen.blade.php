@extends('client.layout')

@section('css')
<link rel="stylesheet" href="{{ asset('css/login.css') }}">
@endsection

@section('body')

    <div class="fixed h-screen inset-0 z-20 flex items-center justify-center" id="">
        <div class="fixed h-screen inset-0 z-30" id="enter-username-overlay">
        </div>
        <form id="loginform" action="{{route('action_login')}}" class="login-form-screen w-[402px] h-[355px] z-40 px-5">
            <div class="form-group mt-16">
                <input type="text" class="form-control !text-left !text-blue-500 placeholder:text-[#01c0fa] rounded-full" placeholder="Tài khoản" name="username" autocomplete="off" required="">
            </div>
            <div class="form-group">
                <input type="password" class="form-control !text-left !text-blue-500 placeholder:text-[#01c0fa] rounded-full" placeholder="Mật khẩu" name="password" autocomplete="off" required="">
            </div>
            {{-- <div class="form-check text-center">
                <label class="form-check-label" for="flexCheckDefault">
                    Ghi nhớ đăng nhập
                </label>
                <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
            </div> --}}
            {{-- <div class="form-group form-group_btn">
                <div class="btn btn-model-cf">Huỷ thao tác</div>
                <button type="submit" class="btn btn-model-cc"> Đăng nhập </button>
            </div> --}}
            <div class="form-group">
                <button type="submit" class="!bg-gradient-to-r from-[#00ACE4] to-[#4BE5E4] btn btn-model-cc py-2 !border-2 !border-white w-full rounded-full text-white"> Đăng nhập </button>
            </div>

            <div class="q-register !my-5">
                Chưa có tài khoản? <a href="{{route('user.register-screen')}}" class="btn-register text-yellow-300 hover:text-yellow-300 hover:text-underline">Đăng ký</a>
            </div>

            <a href="/" class="!bg-gradient-to-r from-[#00ACE4] to-[#4BE5E4] btn btn-model-cf py-2 !border-2 !border-white w-full rounded-full text-white">Huỷ thao tác</a>
        </form>
    </div>
@endsection

@section('js')
<script src="{{ asset('js/login.js').'?v=1.0.0' }}"></script>
@endsection
