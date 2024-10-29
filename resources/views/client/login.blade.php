@extends('client.layout')

@section('css')
<link rel="stylesheet" href="{{ asset('css/login.css') }}">
@endsection

@section('body')
    <div class="absolute inset-0 bg-black opacity-20"></div>

    <div class="relative z-10 flex flex-col items-center justify-center space-y-8">
        <img src="{{asset('images/graphics/logo-2.png')}}" alt="HACK BẮN CÁ" width="300" height="150" class="mb-20" />
        <div class="flex space-x-8">
            <a href="{{route('user.register-screen')}}" class="relative group">
                <div class="relative flex items-center">
                    <img
                        src="{{asset('images/graphics/register-btn-img.png')}}"
                        alt="Register Icon"
                        width="300"
                        height="180"
                        class="mr-2 z-10"
                    />

                    <div class="absolute bottom-[55%] right-10 z-0">
                        <img src="{{asset('images/graphics/shark-gun-img.png')}}" alt="Shark with Gun" width="400" height="400" />
                    </div>
                </div>
            </a>
            <a href="{{route('user.login-screen')}}" class="relative group">
                <div class="relative flex items-center">
                    <img
                        src="{{asset('images/graphics/login-btn-img.png')}}"
                        alt="Login Icon"
                        width="300"
                        height="180"
                        class="mr-2 z-10"
                    />

                    <div class="absolute bottom-[55%] right-10 z-0">
                        <img src="{{asset('images/graphics/fish-group-img.png')}}" alt="Shark with Gun" width="400" height="400" />
                    </div>
                </div>
            </a>
        </div>
    </div>

    {{-- Màn hình nhập tên hiển thị và hiển thị đăng ký thành công --}}

    {{-- <div class="fixed h-screen inset-0 z-20 flex items-center justify-center" id="enter-username-section">
        <div class="fixed h-screen inset-0 z-30" id="enter-username-overlay">
        </div>
        <form id="enterUsernameForm" action="" class="flex flex-col justify-between w-[430px] h-[288px] z-40 rounded-3xl border-4 border-[#F9DF97] p-5">
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
        </form>
        <form id="registerSucessForm" action="" class="flex flex-col justify-between w-[430px] h-[288px] z-40 rounded-3xl p-5">
            <h1 class="mt-20 text-white font-bold text-xl text-center
            ">Chúc mừng bạn đã đăng ký thành công</h1>

            <button style="background: linear-gradient(to right, #00ACE4, #4BE5E4);" type="submit" class="btn btn-model-cc py-2 !border-2 !border-white w-full text-white rounded-full">
                Xác nhận
            </button>
        </form>
    </div> --}}


    @include('client.login-model')
    @include('client.register-model')
@endsection

@section('js')
<script src="{{ asset('js/login.js').'?v=1.0.0' }}"></script>
@endsection
