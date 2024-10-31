<!DOCTYPE html>
<!-- saved from url=(0020)http://hackslot.win/ -->
<html lang="en" style="height: 100%;">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ env('TITLE_SITE', 'HACK NOHU 2024') }}</title>
    <meta name="api-token" content="{{ csrf_token() }}">

    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/custom.css').'?v=1.0.1' }}">
    <link rel="stylesheet" href="{{ asset('css/main.css').'?v=1.0.0' }}">.
    <link href="{{ asset('css/font-awesome.min.css') }}" rel="stylesheet">
    @yield('css')
    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.10.1/jquery.min.js"></script>
    <script src="{{ asset('js/coin.js').'?v=1.0.0' }}"></script>
    <script type="text/javascript">
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="api-token"]').attr('content')
            }
        });
    </script>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body style="position: relative; min-height: 100%; top: 0px;">
<div id="app" data-v-app="">
    @yield('body')
</div>
<div class="model-logout model-logout_active" style="display: none" id="coin-model">
    <div class="model-logout_overlay"></div>
    <div class="model-logout_wrapper relative flex flex-col justify-center sm:justify-around items-center">
        
        <img  loading="lazy" class="close-btn absolute top-[17px] right-[0px] cursor-pointer" width="80" height="80" src="{{asset('images/graphics/close-btn.png')}}" alt="">
        <div class="model-title">
            <h1>Bạn muốn nạp xu?</h1>
            <h1>Vui lòng liên hệ với Admin</h1>
        </div>
        <button class="border-2 flex items-center gap-2 bg-gradient-to-r from-[#00ACE4] to-[#4BE5E4] rounded-full pe-3 btn-help">
            <div class="border-2 border-white rounded-full size-[35px]">
                <img loading="lazy" width="35" height="35" src="{{asset('images/telegram-logo.svg')}}" alt="">
            </div>
           
            <span class="text-blue-800 font-bold text-lg">
                @08999981136
            </span>
        </button>
    </div>
</div>
<div class="model-logout model-logout_active" style="display: none" id="logout1-model">
    <div class="model-logout_overlay"></div>
    <div class="model-logout_wrapper flex flex-col justify-around">
        <div class="model-title">
            <h1>Đăng xuất</h1>
        </div>
        <form id="logoutform" class="!mx-0"  action="/logout" method="POST" >
            {{ csrf_field() }}
            <div class="form-group form-group_btn">
                <div class="btn btn-model-cc">Huỷ</div>
                <button type="submit" class="btn btn-model-cf"> Đồng ý</button>
            </div>
        </form>
    </div>
</div>

<div class="model-logout model-logout_active" style="display: none" id="help-model">
    <div class="model-logout_overlay"></div>
    <div class="model-logout_wrapper relative flex flex-col justify-center sm:justify-around items-center">

        
        {{-- close --}}
        <img loading="lazy" class="close-btn absolute top-[17px] right-[0px] cursor-pointer" width="80" height="80" src="{{asset('images/graphics/close-btn.png')}}" alt="">


        <div class="model-title">
            <h1>Bạn cần hỗ trợ?</h1>
            <h1>Vui lòng liên hệ với Admin</h1>
        </div>
        <h3 class="my-2 !text-lg"> 

        </h3>
        <button class="border-2 flex items-center gap-2 bg-gradient-to-r from-[#00ACE4] to-[#4BE5E4] rounded-full pe-3 btn-help">
            <div class="border-2 border-white rounded-full size-[35px]">
                <img loading="lazy" width="35" height="35" src="{{asset('images/telegram-logo.svg')}}" alt="">
            </div>
           
            <span class="text-blue-800 font-bold text-lg">
                @08999981136
            </span>
        </button>
    </div>
</div>

<div class="model-logout model-logout_active" style="display: none" id="user-model">
    <div class="model-logout_overlay"></div>
    <div class="model-logout_wrapper relative flex flex-col justify-center sm:justify-around items-center">
        
        {{-- close --}}
        <img loading="lazy" class="close-btn absolute top-[17px] right-[0px] cursor-pointer" width="80" height="80" src="{{asset('images/graphics/close-btn.png')}}" alt="">
        <div class="model-title">
            <div class="flex items-center gap-3 mt-2 sm:mt-0">
                <img loading="lazy" width="100" height="100" src="{{asset('images/graphics/avatar.png')}}" alt="">
                <div class="">
                    <h1 class="current-username text-left !text-yellow-300"></h1>
                    <h1 class="current-coin text-left !text-yellow-300"></h1>
                </div>
            </div>
        </div>
        <button id="change-password-btn" class="border-2 flex items-center justify-center gap-2 bg-gradient-to-r from-[#00ACE4] to-[#4BE5E4] rounded-full p-2 w-full">
            
            <span class="text-white font-bold text-lg">
                Đổi mật khẩu
            </span>
        </button>
    </div>
</div>

<div class="model-logout model-logout_active" style="display: none" id="change-password-model">
    <div class="model-logout_overlay"></div>
    <div class="relative flex flex-col justify-around items-center">
        <form id="change-password-form" class="relative p-[100px] flex flex-col justify-around">
            <img class="close-btn absolute top-[4px] right-[2px] cursor-pointer" width="96" height="96" src="{{asset('images/graphics/close-btn.png')}}" alt="">
        
            <div class="form-group">
                <input type="password" class="form-control !text-left !text-blue-500 !placeholder:text-[#01c0fa] !border-2 !border-[#01c0fa] !rounded-full" placeholder="Mật khẩu cũ" name="old_password" autocomplete="off" required="">

                <p id="old-password-error" class="text-yellow-300 mt-1"></p>
            </div>
            <div class="form-group">
                <input type="password" class="form-control !text-left !text-blue-500 !placeholder:text-[#01c0fa] !border-2 !border-[#01c0fa] !rounded-full" placeholder="Mật khẩu mới" name="new_password" autocomplete="off" required="">

                <p id="new-password-error" class="text-yellow-300 mt-1"></p>
            </div>
            <div class="form-group">
                <input type="password" class="form-control !text-left !text-blue-500 !placeholder:text-[#01c0fa] !border-2 !border-[#01c0fa] !rounded-full" placeholder="Xác nhận mật khẩu" name="new_password_confirmation" autocomplete="off" required="">

                <p id="new-password-confirmation-error" class="text-yellow-300 mt-1"></p>
            </div>
            
            <div class="form-group">
                <button id="btn-change-password" type="submit" class="bg-gradient-to-r from-[#00ACE4] to-[#4BE5E4] btn btn-model-cc py-2 !border-2 !border-white w-full !border-2 border-blue-500 !rounded-full text-white"> Đổi mật khẩu </button>
            </div>
        </form>
    </div>
</div>

<div class="model-logout model-logout_active" id="change-password-success-model" style="display: none">
    <div class="model-logout_overlay"></div>
    <form id="changePasswordSuccessForm" action="" class="flex flex-col justify-between w-[430px] h-[288px] z-40 rounded-3xl p-5">
        <h1 class="mt-20 text-white font-bold text-xl text-center text-uppercase
        ">Mật khẩu của bạn được thay đổi thành công</h1>
    
        <button type="button" style="background: linear-gradient(to right, #00ACE4, #4BE5E4);"  class="close-btn btn btn-model-cc py-2 !border-2 !border-white w-full text-white !rounded-full">
            Xác nhận
        </button>
    </form>
    
</div>

<div class="model-logout model-logout_active" style="display: none" id="coin-alert-model">
    <div class="model-logout_overlay"></div>
    <div style="background: url({{asset('images/background/bg-out-coin.png')}}); background-repeat: no-repeat;" class="model-logout_wrapper relative flex flex-col justify-center sm:justify-around items-center">
        
        <img class="close-btn absolute top-[1px] right-[-5px] cursor-pointer" width="93" height="93" src="{{asset('images/graphics/close-btn.png')}}" alt="">
        <div class="model-title">
            <div class="flex items-center gap-3">
                <img width="80" height="80" src="{{asset('images/graphics/out-coin.png')}}" alt="">
                <h1 class="!mb-0">BẠN ĐÃ HẾT XU</h1>
            </div>
        </div>
        <p class="text-[#00FF09] my-4 text-lg">Vui lòng liên hệ với Admin để nạp thêm</p>
        <button class="border-2 flex items-center gap-2 bg-gradient-to-r from-[#00ACE4] to-[#4BE5E4] rounded-full pe-3 btn-help">
            <div class="border-2 border-white rounded-full size-[35px]">
                <img  width="35" height="35" src="{{asset('images/telegram-logo.svg')}}" alt="">
            </div>
            <span class="text-blue-800 font-bold text-lg">
                @08999981136
            </span>
        </button>
    </div>
</div>




@include('client.alert', [
    'title' => '',
    'content' => 'Vui lòng liên hệ admin để được hỗ trợ',
    'id' => 'help-model'
])

{{-- @include('client.alert', [
    'title' => 'Bạn đã hết xu',
    'content' => 'Vui lòng liên hệ admin để nạp thêm',
    'id' => 'coin-alert-model'
]) --}}
@yield('js')

<script>
    // Change password

    const changePasswordForm = document.getElementById('change-password-form');

    changePasswordForm.addEventListener('submit', async (e) => {
        e.preventDefault();

        $.ajax({
            url: "/change-password",
            method: "POST",
            data: $("#change-password-form").serialize(),
            success: function (data) {
                // window.location.reload();

                // Ẩn form đổi mật khẩu
                $("#change-password-model").hide();

                // Hiện thông báo đổi mật khẩu thành công
                $("#change-password-success-model").show();

            },
            error: function (e) {
                console.log("e.responseJSON.errors: ", e.responseJSON.errors);

                const newPasswordFieldErrors = e.responseJSON.errors["new_password"]
                const oldPasswordFieldErrors = e.responseJSON.errors["old_password"]
                const newPasswordConfirmationFieldErrors = e.responseJSON.errors["new_password_confirmation"]


                // Render ra id của error từng field
                if (newPasswordFieldErrors) {
                    $("#new-password-error").text(newPasswordFieldErrors[0]);
                } else {
                    $("#new-password-error").text('');
                }

                if (oldPasswordFieldErrors) {
                    $("#old-password-error").text(oldPasswordFieldErrors[0]);
                } else {
                    $("#old-password-error").text('');
                }

                if (newPasswordConfirmationFieldErrors) {
                    $("#new-password-confirmation-error").text(newPasswordConfirmationFieldErrors[0]);
                } else {
                    $("#new-password-confirmation-error").text('');
                }
                

                // if (e.status === 422) {
                //     $.each(e.responseJSON.errors, function (key, value) {
                //         $("#help-model h3").append(
                //             "<div>" + value[0] + "</div>"
                //         );
                //     });
                // } else {
                //     $("#help-model h3").text(
                //         "Có lỗi xảy ra. Vui lòng liên hệ admin để được hỗ trợ."
                //     );
                // }
                // $("#help-model").show();
            },
        });
    });
</script>

</body>

</html>
