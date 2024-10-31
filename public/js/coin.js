$(document).ready(function () {
    var userId;
    var coin;
    renderCaptcha();
    getProfile();
    $(document).on("click", ".btn-coin", function () {
        $("#coin-model").show();
    });
    $(document).on("click", ".btn-logout1", function () {
        $("#logout1-model").show();
    });
    $(document).on("click", ".btn-help-model", function () {
        $("#help-model").show();
    });
    $(document).on("click", ".btn-help", function () {
        $("#help-model").hide();
    });
    $(document).on("click", ".btn-user-model", function () {
        $("#user-model").show();
    });

    $(document).on("click", "#change-password-btn", function () {
        $("#user-model").hide();

        $("#change-password-model").show();
    });

    $(document).on("click", ".close-btn", function () {
        $("#coin-model").hide();
        $("#logout1-model").hide();
        $("#help-model").hide();
        $("#user-model").hide();
        $("#change-password-model").hide();
        $("#coin-alert-model").hide();
        $("#round-modal").hide();
        $("#change-password-success-model").hide();
    });

    $(document).on("click", ".btn-tele", function () {
        var telegramLink = "https://t.me/hackslotokvip";
        window.open(telegramLink, "_blank");
    });

    $("#coinform .btn-model-cf").click(function (e) {
        e.preventDefault();
        let code = $('input[name="code"]').val();

        $.ajax({
            url: "/code",
            method: "POST",
            data: { code: code },
            success: function (data) {
                $("#coinform .error").remove();
                if (data.code === 404) {
                    $('input[name="code"]').after(
                        '<div class="error">Code không đúng.</div>'
                    );
                } else if (data.message == "Error") {
                    $('input[name="code"]').after(
                        '<div class="error">Đã có lỗi xảy ra, vui lòng liên hệ với admin để xử lý.</div>'
                    );
                } else if (data.message == "used") {
                    $('input[name="code"]').after(
                        '<div class="error">Code đã được sử dụng.</div>'
                    );
                } else {
                    location.reload();
                }
            },
        });
    });

    $("#logoutform .btn-model-cf").click(function (e) {
        //e.preventDefault();
        $("#logoutform").submit();
        // $.ajax({
        //     url: '/logout',
        //     method: 'POST',
        //     success: function(data) {
        //     }
        // })
    });

    $("#coinform .btn-model-cc").click(function (e) {
        $("#coin-model").hide();
    });
    $("#logoutform .btn-model-cc").click(function (e) {
        $("#logout1-model").hide();
    });

    $(document).on("click", ".btn-help", function () {
        window.open(window.telegramLink, "_blank");
    });

    $("#help-model .btn-model-cc").click(function (e) {
        $("#help-model").hide();
    });

    $("#coin-alert-model .btn-model-cc").click(function (e) {
        $("#coin-alert-model").hide();
    });
    $(".hamburger").click(function (e) {
        $(".header-group-btn").addClass("header-group-btn_active");
    });

    $(".detail-game").click(function () {
        let slug = $(this).attr("data-slug");
        console.log(slug);
        if (coin <= 0) {
            $("#coin-alert-model").show();
        } else {
            window.location.href = "/slot/" + slug;
        }
    });

    function getProfile() {
        $.ajax({
            url: "/api/user/current",
            method: "GET",
            success: function (data) {
                userId = data.result.id;
                coin = data.result.coin;
                $("#coin").text(data.result.coin);
                $("#user-name").text(data.result.username);

                $(".current-username").text(data.result.username);
                $(".current-coin").text("$" + data.result.coin);
            },
        });
    }

    function renderCaptcha() {
        $("#captcha").text(Math.floor(1000 + Math.random() * 9000));
    }
});
