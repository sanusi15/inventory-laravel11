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

    $(".btn-showqr").click(function (e) {
        e.preventDefault();
        var deviceCode = $(this).data("code");
        $.ajax({
            url: "/show_qrequip/" + deviceCode,
            method: "GET",
            dataType: "JSON",
            success: function (data) {
                $("#img-qrcode").attr("src", data.qr_code_path);
                $("#btn-downloadqrcode").attr("href", data.qr_code_path);
                $("#bs-modalshowqr").modal("show");
            },
        });
    });

    $(".btn-selectitem").click(function (e) {
        e.preventDefault();
        var oldequipcpde = $(this).data("code");
        var computercode = $(this).data("computercode");
        var devicetype = $(this).data("type");
        $.ajax({
            url: "/show_equip/" + devicetype,
            method: "GET",
            dataType: "JSON",
            success: function (data) {
                var frmModal = $("#bs-modalselectitem");
                if (data.length > 0) {
                    $.each(data, function (key, value) {
                        $("#tbl-modallistequip tbody").append(`
                            <tr>
                                <td><a href="#" class="btn btn-sm btn-primary" onclick="pilihEquipment('${
                                    value.code
                                }')" data-code="${value.code}"><i class="mdi mdi-check-all mr-1"></i>select</a></td>
                                <td>${value.code}</td>
                                <td>${value.merk}</td>
                                <td>${value.detail_spesification}</td>
                                <td class="text-right">${formatNumber(
                                    value.nominal_price
                                )}</td>
                                <td>${value.purchase_date}</td>
                            </tr>
                        `);
                    });
                }
                frmModal.find("#computer-code").val(computercode);
                frmModal.find("#old-equipcode").val(oldequipcpde);
                frmModal.find("#device-type").val(devicetype);
                frmModal.modal("show");
            },
        });
    });

    $("#bs-modalselectitem").on("hidden.bs.modal", function () {
        $("#tbl-modallistequip tbody").html("");
        $("#reason").val("");
        $("#equipselect").val("");
    });

    $(".inp-number").on("input", function () {
        this.value = this.value.replace(/[^0-9]/g, "");
    });

    $(".inp-currency").on("input", function () {
        let value = this.value.replace(/[^0-9]/g, "");
        this.value = value.replace(/\B(?=(\d{3})+(?!\d))/g, ",");
    });

    function formatNumber(num) {
        return num.toString().replace(/(\d)(?=(\d{3})+(?!\d))/g, "$1,");
    }
});

function pilihEquipment(code) {
    var frmModal = $("#bs-modalselectitem");
    frmModal.find("#equipselect").val(code);
}
