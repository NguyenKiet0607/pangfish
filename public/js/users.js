window.addEventListener("load", function () {
    var url = $("#datatable").attr("data-url");
    var len = sessionStorage.getItem("adminTable_length");
    len = len ? len : 20;
    var table = $("#datatable").DataTable({
        processing: true,
        serverSide: true,
        ajax: url.replace(/&amp;/g, "&"),
        lengthChange: true,
        searching: false,
        scrollY: false,
        scrollX: true,
        columns: [
            {
                data: "id",
                name: "id",
                render: function (data, type, row) {
                    return '<div class="text-right">' + data + "</div>";
                },
            },
            { data: "username", name: "username" },
            { data: "name", name: "name" },
            { data: "coin", name: "coin" },
            { data: "total_credit", name: "total_credit" },
            { data: "phone", name: "phone" },
            { data: "last_login", name: "last_login" },
            { data: "ip", name: "ip" },
            { data: "status", name: "status" },
            {
                data: "action",
                name: "action",
                orderable: false,
                searchable: false,
                render: function (data, type, row) {
                    return '<div class="text-center">' + data + "</div>";
                },
            },
        ],
        columnDefs: [
            { width: "5%", targets: 0 },
            { width: "15%", targets: 1 },
            { width: "15%", targets: 2 },
            { width: "10%", targets: 3 },
            { width: "15%", targets: 4 },
            { width: "10%", targets: 5 },
            { width: "10%", targets: 6 },
            { width: "10%", targets: 7 },
            { width: "10%", targets: 8 },
        ],
        lengthMenu: [
            [10, 20, 50, 100],
            [10, 20, 50, 100],
        ],
        pageLength: len,
    });

    // $("#datatable").on("length.dt", function (e, settings, len) {
    //     sessionStorage.setItem("adminTable_length", len);
    // });

    // if ($("div").hasClass("alert")) {
    //     setTimeout(function () {
    //         $("div.alert").css("display", "none");
    //     }, 5000);
    // }

    $(".btn-clear-filter").click(function (e) {
        e.preventDefault();
        $("#startDate").val("");
        $("#endDate").val("");
        $("#startId").val("");
        $("#endId").val("");
        $("#name").val("");
        $("#form-admin-search").submit();
    });

    // Validate date range và ID range trước khi submit
    $("#form-admin-search").submit(function (e) {
        var startDate = $("#startDate").val();
        var endDate = $("#endDate").val();
        var startId = $("#startId").val();
        var endId = $("#endId").val();

        if (startDate && endDate && startDate > endDate) {
            alert("Ngày bắt đầu phải nhỏ hơn hoặc bằng ngày kết thúc");
            e.preventDefault();
            return false;
        }

        if (startId && endId && parseInt(startId) > parseInt(endId)) {
            alert("ID bắt đầu phải nhỏ hơn hoặc bằng ID kết thúc");
            e.preventDefault();
            return false;
        }
    });

    $("#goto-page-btn").click(function (e) {
        e.preventDefault();
        const pageInput = $("#goto-page-input").val();
        const pageNumber = parseInt(pageInput);

        // Kiểm tra input
        if (!pageNumber || isNaN(pageNumber)) {
            alert("Vui lòng nhập số trang hợp lệ");
            return;
        }

        const info = table.page.info();
        const maxPage = info.pages;

        // Kiểm tra số trang có hợp lệ không
        if (pageNumber < 1 || pageNumber > maxPage) {
            alert(`Vui lòng nhập số trang từ 1 đến ${maxPage}`);
            return;
        }

        // Chuyển đến trang được chọn (trừ 1 vì DataTables đếm từ 0)
        table.page(pageNumber - 1).draw(false);
    });
});

//Open modal add credit when click class credit
$(document).on("click", ".credit", function () {
    $("#id-in-modal").val($(this).attr("data-id"));
    $("#model-in-modal").val($(this).attr("data-model"));
    $("#modal-add-credit").modal("show");
});
//Submit form add credit
$(document).on("click", "#btn-add-credit", function () {
    $("#form-add-credit").submit();
});
