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
        var computerCode = $(this).data("id");
        $.ajax({
            url: "/show_computer/" + computerCode,
            type: "GET",
            dataType: "JSON",
            success: function (data) {
                var computer = data.computer;
                var frmModal = $("#bs-example-modal-lg");
                frmModal.find("#code").val(computer.code);
                frmModal.find("#merk").val(computer.merk);
                frmModal.find("#type").val(computer.type);
                frmModal.find("#device_id").val(computer.device_id);
                frmModal.find("#product_id").val(computer.product_id);
                frmModal.find("#os").val(computer.os);
                frmModal.find("#processor").val(computer.processor);
                frmModal.find("#ram").val(computer.ram);
                frmModal
                    .find("#storage_one")
                    .val(
                        computer.storage_type_one +
                            " - " +
                            computer.storage_capacity_one
                    );
                frmModal
                    .find("#storage_two")
                    .val(
                        computer.storage_type_two +
                            " - " +
                            computer.storage_capacity_two
                    );
                frmModal
                    .find("#detail_spesification")
                    .val(computer.detail_spesification);
                frmModal.find("#status_computer").val(computer.status);
                frmModal.find("#information").val(computer.information);
                frmModal.find("#password").val(computer.password);
                frmModal.find("#purchase_date").val(computer.purchase_date);
                frmModal.find("#waranty_expiry").val(computer.waranty_expiry);
                frmModal
                    .find("#nominal_price")
                    .val(formatNumber(computer.nominal_price));
                if (computer.user != null) {
                    frmModal
                        .find("#users")
                        .val(
                            computer.user.name +
                                " - " +
                                computer.user.position.position_name
                        );
                }
                frmModal.find(".img-qrcode").attr("src", data.qr_code_path);
                frmModal.find(".show-qrcode").attr("href", data.qr_code_path);
                frmModal
                    .find(".download-qrcode")
                    .attr("href", data.qr_code_path);
                if (computer.equip_computer.length > 0) {
                    $.each(computer.equip_computer, function (key, value) {
                        $("#data-equipcomputer .row").append(`
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
        var computerCode = $(this).data("id");
        var formId = "#frmDelete-" + computerCode;
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

    $("#sw-monitor").change(function () {
        if ($(this).prop("checked")) {
            $("#row-monitor").slideDown();
        } else {
            $("#row-monitor").slideUp();
        }
    });
    $("#sw-mouse").change(function () {
        if ($(this).prop("checked")) {
            $("#row-mouse").slideDown();
        } else {
            $("#row-mouse").slideUp();
        }
    });
    $("#sw-keyboard").change(function () {
        if ($(this).prop("checked")) {
            $("#row-keyboard").slideDown();
        } else {
            $("#row-keyboard").slideUp();
        }
    });

    $(".inp-currency").on("input", function () {
        let value = this.value.replace(/[^0-9]/g, "");
        this.value = value.replace(/\B(?=(\d{3})+(?!\d))/g, ",");
    });
    // END FORM ADD AND EDIT

    $("#bs-example-modal-lg").on("hidden.bs.modal", function () {
        $(this)
            .find("input,textarea,select")
            .val("")
            .end()
            .find("input[type=checkbox], input[type=radio]")
            .prop("checked", "");
        $("#data-equipcomputer .row").html("");
    });

    function formatNumber(num) {
        return num.toString().replace(/(\d)(?=(\d{3})+(?!\d))/g, "$1,");
    }
});
