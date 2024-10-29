<div class="model-logout model-logout_active" style="display: none" id="login-model">
    <div class="model-logout_overlay"></div>
    <div class="model-logout_wrapper bg-login">
        
        <form id="loginform" class="!mt-10">
            <div class="form-group">
                <input type="text" class="form-control !text-left !text-blue-500 placeholder:text-[#01c0fa]" placeholder="Tài khoản" name="username" autocomplete="off" required="">
            </div>
            <div class="form-group">
                <input type="password" class="form-control !text-left !text-blue-500 placeholder:text-[#01c0fa]" placeholder="Mật khẩu" name="password" autocomplete="off" required="">
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
                <button style="background: #4BE5E4 !important" type="submit" class="btn btn-model-cc py-2 !border-2 !border-white"> Đăng nhập </button>
            </div>

            <div class="q-register !my-5">
                Chưa có tài khoản? <span class="btn-register">Đăng ký</span>
            </div>

            <div style="background: #4BE5E4 !important" class="btn btn-model-cf py-2 !border-2 !border-white">Huỷ thao tác</div>
        </form>
    </div>
</div>