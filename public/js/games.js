window.addEventListener("load", function () {
    var url = $("#datatable").attr("data-url");
    var len = sessionStorage.getItem("adminTable_length");
    len = len ? len : 20;

    // Khởi tạo DataTable
    var table = $("#datatable").DataTable({
        processing: true,
        serverSide: true,
        ajax: {
            url: url.replace(/&amp;/g, "&"),
            data: function (d) {
                d.name = $("#name").val();
                d.parent_id = $("#parent_id").val();
            },
        },
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
            { data: "name", name: "name" },
            { data: "slug", name: "slug" },
            { data: "percent", name: "percent" },
            { data: "action", name: "action" },
        ],
        columnDefs: [
            { width: "5%", targets: 0 },
            { width: "40%", targets: 1 },
            { width: "30%", targets: 2 },
            { width: "10%", targets: 3 },
        ],
        lengthMenu: [
            [10, 20, 50, 100],
            [10, 20, 50, 100],
        ],
        pageLength: len,
    });

    // Xử lý sự kiện tìm kiếm
    var searchTimeout;
    $("#name").on("keyup", function () {
        clearTimeout(searchTimeout);
        searchTimeout = setTimeout(function () {
            table.draw();
        }, 500);
    });

    // Xử lý sự kiện thay đổi game cha
    $("#parent_id").on("change", function () {
        table.draw();
    });

    // Các xử lý khác
    $("#datatable").on("length.dt", function (e, settings, len) {
        sessionStorage.setItem("adminTable_length", len);
    });

    if ($("div").hasClass("alert")) {
        setTimeout(function () {
            $("div.alert").css("display", "none");
        }, 5000);
    }
});
