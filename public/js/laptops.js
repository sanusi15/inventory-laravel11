$(document).ready(function () {
    $(".select2").select2();
    $("[data-plugin='switchery']").each(function (e, a) {
        new Switchery(a, {
            size: "small",
            color: "#3bafda",
            secondaryColor: "#adb5bd",
        });
    });
    var HasMessage = $(".flash-message");
    if (HasMessage.length > 0) {
        var StatusMessage = HasMessage.data("status_message");
        var ValueMessage = HasMessage.data("value_message");
        if (StatusMessage == "success") {
            Swal.fire({
                title: "Good job!",
                text: ValueMessage,
                type: "success",
                confirmButtonClass: "btn btn-confirm mt-2",
            });
        }
        if (StatusMessage == "error") {
            Swal.fire({
                title: "Error!",
                text: ValueMessage,
                type: "error",
                confirmButtonClass: "btn btn-confirm mt-2",
            });
        }
    }

    $(".btn-show").click(function (e) {
        e.preventDefault();
        var laptopCode = $(this).data("id");
        $.ajax({
            url: "show_laptop/" + laptopCode,
            type: "GET",
            dataType: "JSON",
            success: function (data) {
                var laptop = data.laptop;
                var frmModal = $("#bs-example-modal-lg");
                frmModal.find("#code").val(laptop.code);
                frmModal.find("#merk").val(laptop.merk);
                frmModal.find("#type").val(laptop.type);
                frmModal.find("#device_id").val(laptop.device_id);
                frmModal.find("#product_id").val(laptop.product_id);
                frmModal.find("#os").val(laptop.os);
                frmModal.find("#processor").val(laptop.processor);
                frmModal.find("#ram").val(laptop.ram);
                frmModal
                    .find("#storage_one")
                    .val(
                        laptop.storage_type_one +
                            " - " +
                            laptop.storage_capacity_one
                    );
                frmModal
                    .find("#storage_two")
                    .val(
                        laptop.storage_type_two +
                            " - " +
                            laptop.storage_capacity_two
                    );
                frmModal
                    .find("#detail_spesification")
                    .val(laptop.detail_spesification);
                frmModal.find("#status_laptop").val(laptop.status);
                frmModal.find("#information").val(laptop.information);
                frmModal.find("#password").val(laptop.password);
                frmModal.find("#purchase_date").val(laptop.purchase_date);
                frmModal.find("#waranty_expiry").val(laptop.waranty_expiry);
                frmModal.find("#nominal_price").val(laptop.nominal_price);
                if (laptop.user == null) {
                    frmModal.find("#users").val("");
                } else {
                    frmModal
                        .find("#users")
                        .val(
                            laptop.user.name +
                                " - " +
                                laptop.user.position.position_name
                        );
                }
                frmModal.find(".img-qrcode").attr("src", data.qr_code_path);
                frmModal.find(".show-qrcode").attr("href", data.qr_code_path);
                frmModal
                    .find(".download-qrcode")
                    .attr("href", data.qr_code_path)
                    .attr("download", laptop.code + ".png");
                if (laptop.equip_computer.length > 0) {
                    $.each(laptop.equip_computer, function (key, value) {
                        $("#data-equiplaptop .row").append(`
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label class="control-label">Jenis</label>
                                    <input type="text" class="form-control" value="${
                                        value.jenis
                                    }" disabled>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label class="control-label">Merk</label>
                                    <input type="text" class="form-control" value="${
                                        value.merk
                                    }" disabled>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label class="control-label">Nominal Price</label>
                                    <input type="text" class="form-control" value="${formatNumber(
                                        value.nominal_price
                                    )}" disabled>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label class="control-label">Purchase Date</label>
                                    <input type="text" class="form-control" value="${
                                        value.purchase_date
                                    }" disabled>
                                </div>
                            </div>
                        `);
                    });
                }
            },
            error: function (data) {
                console.log("Error:", data);
            },
        });
    });

    $(".btn-delete").click(function (e) {
        e.preventDefault();
        var laptopCode = $(this).data("id");
        var formId = "#frmDelete-" + laptopCode;
        Swal.fire({
            title: "Are you sure?",
            text: "You won't be able to revert this!",
            type: "warning",
            showCancelButton: true,
            confirmButtonClass: "btn btn-confirm mt-2",
            cancelButtonClass: "btn btn-cancel ml-2 mt-2",
            confirmButtonText: "Yes, delete it!",
        }).then((result) => {
            if (result.value) {
                $(formId).submit();
            }
        });
    });

    // kosongkan semua inputan saat form ditutup
    $("#bs-example-modal-lg").on("hidden.bs.modal", function () {
        $(this)
            .find("input,textarea,select")
            .val("")
            .end()
            .find("input[type=checkbox], input[type=radio]")
            .prop("checked", "")
            .end();
    });

    // START FORM ADD AND EDIT
    $(".inp-number").on("input", function () {
        this.value = this.value.replace(/[^0-9]/g, "");
    });

    $("#storage_type_two").change(function () {
        if (this.value != "Empty") {
            $("#storage_capacity_two").removeAttr("readonly");
        } else {
            $("#storage_capacity_two").attr("readonly", true);
        }
    });

    $(".inp-currency").on("input", function () {
        let value = this.value.replace(/[^0-9]/g, "");
        this.value = value.replace(/\B(?=(\d{3})+(?!\d))/g, ",");
    });

    $("#location").change(function () {
        let value = $(this).val();
        if (value == "HO") {
            $(".row-job").hide();
            $(".row-job").find("select").val("").trigger("change");
        } else {
            $(".row-job").show();
        }
    });

    $("#status_laptop").change(function () {
        let value = $(this).val();
        if (value == "In Use") {
            $(".row-user").show();
        } else {
            $(".row-user").hide();
            $(".row-user").find("select").val("").trigger("change");
        }
    });

    $("#sw-mouse").change(function () {
        if ($(this).prop("checked")) {
            $("#row-mouse").slideDown();
        } else {
            $("#row-mouse").slideUp();
        }
    });
    $("#sw-monitor").change(function () {
        if ($(this).prop("checked")) {
            $("#row-monitor").slideDown();
        } else {
            $("#row-monitor").slideUp();
        }
    });
    // END FORM ADD AND EDIT
    $("#bs-example-modal-lg").on("hidden.bs.modal", function () {
        $(this)
            .find("input,textarea,select")
            .val("")
            .end()
            .find("input[type=checkbox], input[type=radio]")
            .prop("checked", "");
        $("#data-equiplaptop .row").html("");
    });
    function formatNumber(num) {
        return num.toString().replace(/(\d)(?=(\d{3})+(?!\d))/g, "$1,");
    }
});
