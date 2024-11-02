@extends('client.layout')

@section('css')
<link rel="stylesheet" href="{{ asset('css/login.css') }}">
@endsection

@section('body')

    <div id="login-wrapper-form" class="fixed h-screen inset-0 z-20 flex items-center justify-center">
        <div class="fixed h-screen inset-0 z-30" id="enter-username-overlay">
        </div>

        <form id="registerform" action="" class="register-form-screen z-40">
            <div class="px-5 pt-20">
                <div class="form-group">
                    <input type="text" class="form-control !text-left !text-blue-500 placeholder:text-[#01c0fa] rounded-full" placeholder="Tên tài khoản" name="username" autocomplete="off" required="">
                    <p class="username-error error-message !text-sm text-red-500"></p>
                </div>
                <div class="form-group">
                    <input type="text" class="form-control !text-left !text-blue-500 placeholder:text-[#01c0fa] rounded-full" placeholder="Số điện thoại" name="phone" autocomplete="off" required="">
                    <p class="phone-error error-message !text-sm text-red-500"></p>
                </div>
                <div class="form-group">
                    <input type="password" class="form-control !text-left !text-blue-500 placeholder:text-[#01c0fa] rounded-full" placeholder="Mật khẩu" name="password" autocomplete="off" required="">
                    <p class="password-error error-message !text-sm text-red-500"></p>
                </div>
                <div class="form-group">
                    <input type="password" class="form-control !text-left !text-blue-500 placeholder:text-[#01c0fa] rounded-full" placeholder="Xác nhận mật khẩu" name="password_confirmation" autocomplete="off" required="">
                    <p class="password-confirmation-error error-message !text-sm text-red-500"></p> 
                </div>
                <div class="row mb-4">
                    <div class="col-md-6 col-6 pr-0">
                        <input type="text" class="form-control !h-[40px] text-center !text-blue-500 placeholder:text-[#01c0fa] rounded-full placeholder:font-bold" name="register_code" placeholder="CAPCHA">
                        <p class="register-code-error error-message !text-sm text-red-500"></p>
                    </div>
                    <div class="col-md-6 col-6">
                        <div class="flex items-center gap-2">
                            <img id="captcha_image" src="{{ Captcha::src() }}" alt="captcha" class="flex-1 h-[40px] !border-2 !border-[#01c0fa] rounded-full overflow-hidden">
                            <button type="button" onclick="refreshCaptcha()" class="w-[40px] h-[40px] flex justify-center items-center !border-2 !border-[#01c0fa] rounded-full overflow-hidden">
                                <img class="size-[26px]" src="{{ asset('images/graphics/refresh-captcha-icon.png') }}" alt="refresh">
                            </button>
                        </div>
                    </div>
                    {{-- <div class="col-md-6 col-6">
                        <label class="col-form-label !border-2 !border-[#01c0fa] rounded-full !bg-[#FFDE21]" id="captcha">1234</label>
                    </div> --}}
                </div>
    
                <input type="hidden" name="displayname">
    
                <div class="form-group">
                    <button id="register-btn" type="submit" class="!bg-gradient-to-r from-[#00ACE4] to-[#4BE5E4]  btn btn-model-cc py-2 !border-2 !border-white w-full rounded-full text-white"> Đăng ký </button>
                </div>
                
                <div class="q-register !my-5">
                    Đã có tài khoản? <a href="{{route('user.login-screen')}}" class="btn-login !text-[#FFDE21]">Đăng nhập</a>
                </div>
    
                <a href="/" class="!bg-gradient-to-r from-[#00ACE4] to-[#4BE5E4]  btn btn-model-cf py-2 !border-2 !border-white w-full rounded-full text-white">Huỷ thao tác</a>
            </div>
        </form>
    </div>
    

    <div class="fixed h-screen inset-0 z-20 flex items-center justify-center hidden" id="enter-username-section">
        <div class="fixed h-screen inset-0 z-30" id="enter-username-overlay">
        </div>

        <form id="enterUsernameForm" action="" class="hidden flex flex-col justify-between w-[430px] h-[288px] z-40 rounded-3xl border-4 border-[#F9DF97] p-5">
            <div>
                <input type="text" class="form-control !text-left !text-blue-500 placeholder:text-[#01c0fa] !border-2 !border-[#01c0fa] !rounded-full" placeholder="Nhập tên hiển thị" name="displayname" autocomplete="off" required="">
                
                <p id="enter-username-error" class="mt-1 text-red-500"></p>
            </div>

            <ul class="text-yellow-300 mt-2 mb-5 text-sm">
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
        
        <form id="registerSucessForm" action="" class="hidden flex flex-col justify-between w-[430px] h-[288px] z-40 rounded-3xl p-5">
            <h1 class="mt-20 text-white font-bold text-xl text-center
            ">Chúc mừng bạn đã đăng ký thành công</h1>

            <input type="hidden" name="username">
            <input type="hidden" name="password">

            <button style="background: linear-gradient(to right, #00ACE4, #4BE5E4);" type="submit" class="btn btn-model-cc py-2 !border-2 !border-white w-full text-white rounded-full">
                Xác nhận
            </button>
        </form>
    </div>
@endsection

@section('js')
<script src="{{ asset('js/login.js').'?v=1.0.0' }}"></script>
<script>
    function refreshCaptcha() {
        fetch('/refresh-captcha')
            .then(response => response.text())
            .then(src => {
                document.getElementById('captcha_image').src = src + '?' + Math.random();
            })
            .catch(error => console.error('Error refreshing captcha:', error));
    }

    // Validate enter username form
    const registerForm = document.getElementById('registerform');
    const enterUsernameForm = document.getElementById('enterUsernameForm');
    const enterUsernameError = document.getElementById('enter-username-error');
    const registerSucessForm = document.getElementById('registerSucessForm');

    const loginWrapperForm = document.getElementById('login-wrapper-form');

    enterUsernameForm.addEventListener('submit', function (e) {
        e.preventDefault();
        const displaynameInput = enterUsernameForm.querySelector('input[name="displayname"]');
        const displayname = displaynameInput.value.trim();
        
        if (displayname.length < 6) {

            enterUsernameError.innerText = 'Tên hiển thị phải có ít nhất 6 ký tự';
            displaynameInput.classList.add('border-red-500');
            return;
        }

        const username = document.querySelector('input[name="username"]').value.trim();

        if (displayname === username) {
            enterUsernameError.innerText = 'Tên hiển thị không được trùng với tên đăng nhập';
            displaynameInput.classList.add('border-red-500');
            return;
        }

        // set displayname value to hidden input
        registerForm.querySelector('input[name="displayname"]').value = displayname;

        // Call API to register

        $.ajax({
            url: "/register-displayname",
            method: "POST",
            data: $("#registerform").serialize(),
            success: function (data) {
                
                document.getElementById("registerSucessForm").classList.remove("hidden");

                document.getElementById("enterUsernameForm").classList.add("hidden");
                
                loginWrapperForm.classList.add("hidden");

                // set username and password value to hidden input

                const username = registerForm.querySelector('input[name="username"]').value;
                const password = registerForm.querySelector('input[name="password"]').value;

                registerSucessForm.querySelector('input[name="username"]').value = username;
                registerSucessForm.querySelector('input[name="password"]').value = password;

            },
            error: function (e, data) {
                if (e.status === 422) {
                    $.each(e.responseJSON.errors, function (key, value) {
                        $("#help-model h3").append(
                            "<div>" + value[0] + "</div>"
                        );
                    });
                } else {
                    $("#help-model h3").text(
                        "Có lỗi xảy ra. Vui lòng liên hệ admin để được hỗ trợ."
                    );
                }
                $("#help-model").show();
                
                fetch('/refresh-captcha')
                    .then(response => response.text())
                    .then(src => {
                        document.getElementById('captcha_image').src = src + '?' + Math.random();
                    })
                    .catch(error => console.error('Error refreshing captcha:', error));
            },
        });

    });

    registerSucessForm.addEventListener('submit', function (e) {
        e.preventDefault();
        $.ajax({
            url: "/login",
            method: "POST",
            data: $("#registerSucessForm").serialize(),
            success: function (data) {
                window.location.reload();
            },
            error: function (e) {
                if (e.status === 422) {
                    $("#help-model h3").text(
                        "Tài khoản hoặc mật khẩu không chính xác."
                    );
                } else {
                    $("#help-model h3").text(
                        "Có lỗi xảy ra. Vui lòng liên hệ admin để được hỗ trợ."
                    );
                }
                $("#help-model").show();
            },
        });
    });

</script>
@endsection
