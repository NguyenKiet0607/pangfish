<div class="model-logout model-logout_active" style="display: none" id="register-model">
    <div class="model-logout_overlay"></div>
    <div class="model-logout_wrapper bg-register">
        {{-- <div class="model-title">
            <h1 class="mb-0">ĐĂNG KÝ</h1>
        </div> --}}
        <form id="registerform" class="!mt-10">
            <div class="form-group">
                <input type="text" class="form-control !text-left !text-blue-500 placeholder:text-[#01c0fa]" placeholder="Tên tài khoản" name="username" autocomplete="off" required="">
            </div>
            <div class="form-group">
                <input type="text" class="form-control !text-left !text-blue-500 placeholder:text-[#01c0fa]" placeholder="Số điện thoại" name="phone" autocomplete="off" required="">
            </div>
            <div class="form-group">
                <input type="password" class="form-control !text-left !text-blue-500 placeholder:text-[#01c0fa]" placeholder="Mật khẩu" name="password" autocomplete="off" required="">
            </div>
            <div class="form-group">
                <input type="password" class="form-control !text-left !text-blue-500 placeholder:text-[#01c0fa]" placeholder="Xác nhận mật khẩu" name="password_confirmation" autocomplete="off" required="">
            </div>
            <div class="row mb-4">
                <div class="col-md-6 col-6 pr-0">
                    <input type="text" class="form-control text-center !text-blue-500 placeholder:text-[#01c0fa] placeholder:font-bold" name="register_code" placeholder="CAPCHA">
                </div>
                <div class="col-md-6 col-6">
                    <label class="col-form-label !border-2 !border-[#01c0fa] !bg-[#FFDE21]" id="captcha">1234</label>
                </div>
            </div>

            <div class="form-group">
                <button style="background: #4BE5E4 !important" type="submit" class="btn btn-model-cc py-2 !border-2 !border-white"> Đăng ký </button>
            </div>
            
            <div class="q-register !my-5">
                Đã có tài khoản? <span class="btn-login !text-[#FFDE21]">Đăng nhập</span>
            </div>

            <div style="background: #4BE5E4 !important" class="btn btn-model-cf py-2 !border-2 !border-white">Huỷ thao tác</div>
        </form>
    </div>
</div>