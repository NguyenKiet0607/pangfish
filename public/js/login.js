$(document).ready(function () {
    $(document).on("click", ".btn-login", function () {
        $("#register-model").hide();
        $("#login-model").show();
    });
    $(document).on("click", ".btn-register", function () {
        $("#register-model").show();
        $("#login-model").hide();
    });

    $("#loginform .btn-model-cc").click(function (e) {
        e.preventDefault();
        $.ajax({
            url: "/login",
            method: "POST",
            data: $("#loginform").serialize(),
            success: function (data) {
                window.location.reload();
            },
            error: function (e) {
                if (e.status === 422) {
                    // $("#help-model h3").text(
                    //     "Tài khoản hoặc mật khẩu không chính xác."
                    // );
                    $(".error-message").text(
                        "Tài khoản hoặc mật khẩu không chính xác."
                    );
                } else {
                    $(".error-message").text(
                        "Có lỗi xảy ra. Vui lòng liên hệ admin để được hỗ trợ."
                    );
                    // $("#help-model h3").text(
                    //     "Có lỗi xảy ra. Vui lòng liên hệ admin để được hỗ trợ."
                    // );
                }
                // $("#help-model").show();
            },
        });
    });

    $("#registerform #register-btn").click(function (e) {
        e.preventDefault();
        // if ($('input[name="register_code"]').val() !== $("#captcha").text()) {
        //     $("#help-model h3").text("Mã đăng nhập không khớp");
        //     $("#help-model").show();
        // } else {

        // }

        $.ajax({
            url: "/register",
            method: "POST",
            data: $("#registerform").serialize(),
            success: function (data) {
                // $("#help-model h3").text("Đăng ký thành công.");
                // $("#help-model").show();
                // setTimeout(function () {
                //     window.location.reload();
                // }, 1000);

                // Remove hidden class to show the enter username section
                $("#enter-username-section").removeClass("hidden");
                $("#enterUsernameForm").removeClass("hidden");
            },
            error: function (e, data) {
                const passwordFieldErrors = e.responseJSON.errors["password"];
                const usernameFieldErrors = e.responseJSON.errors["username"];
                const phoneFieldErrors = e.responseJSON.errors["phone"];
                const register_code = e.responseJSON.errors["register_code"];
                const passwordConfirmFieldErrors =
                    e.responseJSON.errors["password_confirmation"];

                // Render ra id của error từng field
                if (passwordFieldErrors) {
                    $(".password-error").text(passwordFieldErrors[0]);
                } else {
                    $(".password-error").text("");
                }

                if (passwordConfirmFieldErrors) {
                    $(".password-confirmation-error").text(
                        passwordConfirmFieldErrors[0]
                    );
                } else {
                    $(".password-confirmation-error").text("");
                }

                if (usernameFieldErrors) {
                    $(".username-error").text(usernameFieldErrors[0]);
                } else {
                    $(".username-error").text("");
                }

                if (phoneFieldErrors) {
                    $(".phone-error").text(phoneFieldErrors[0]);
                } else {
                    $(".phone-error").text("");
                }

                if (register_code) {
                    $(".register-code-error").text(register_code[0]);
                } else {
                    $(".register-code-error").text("");
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
                //$("#captcha").text(Math.floor(1000 + Math.random() * 9000));
                fetch("/refresh-captcha")
                    .then((response) => response.text())
                    .then((src) => {
                        document.getElementById("captcha_image").src =
                            src + "?" + Math.random();
                    })
                    .catch((error) =>
                        console.error("Error refreshing captcha:", error)
                    );
            },
        });
    });

    $("#loginform .btn-model-cf").click(function (e) {
        $("#login-model").hide();
    });
    $("#registerform .btn-model-cf").click(function (e) {
        $("#register-model").hide();
    });
});
