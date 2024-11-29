$(document).ready(function () {
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
        var deviceCode = $(this).data("id");
        var typeDevice = deviceCode.slice(0, 3);
        var url = typeDevice == "COM" ? "/show_computer" : "/show_laptop";
        $.ajax({
            url: url + "/" + deviceCode,
            type: "GET",
            dataType: "JSON",
            success: function (data) {
                var device = typeDevice == "COM" ? data.computer : data.laptop;
                var frmModal = $("#bs-example-modal-lg");
                frmModal.find("#code").val(device.code);
                frmModal.find("#merk").val(device.merk);
                frmModal.find("#type").val(device.type);
                frmModal.find("#device_id").val(device.device_id);
                frmModal.find("#product_id").val(device.product_id);
                frmModal.find("#os").val(device.os);
                frmModal.find("#processor").val(device.processor);
                frmModal.find("#ram").val(device.ram);
                frmModal
                    .find("#storage_one")
                    .val(
                        device.storage_type_one +
                            " - " +
                            device.storage_capacity_one
                    );
                frmModal
                    .find("#storage_two")
                    .val(
                        device.storage_type_two +
                            " - " +
                            device.storage_capacity_two
                    );
                frmModal
                    .find("#detail_spesification")
                    .val(device.detail_spesification);
                frmModal.find("#status_computer").val(device.status);
                frmModal.find("#information").val(device.information);
                frmModal.find("#password").val(device.password);
                frmModal.find("#purchase_date").val(device.purchase_date);
                frmModal.find("#waranty_expiry").val(device.waranty_expiry);
                frmModal
                    .find("#nominal_price")
                    .val(formatNumber(device.nominal_price));
                frmModal.find(".img-qrcode").attr("src", data.qr_code_path);
                frmModal.find(".show-qrcode").attr("href", data.qr_code_path);
                frmModal
                    .find(".download-qrcode")
                    .attr("href", data.qr_code_path);
                if (device.equip_computer.length > 0) {
                    $.each(device.equip_computer, function (key, value) {
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

    $(".btn-select").click(function (e) {
        e.preventDefault();
        var code = $(this).data("code");
        $("#code_device").val(code);
    });

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
