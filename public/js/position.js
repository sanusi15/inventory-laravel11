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
        var position_id = $(this).data("id");
        $.ajax({
            url: "show_position/" + position_id,
            type: "GET",
            dataType: "JSON",
            success: function (data) {
                var frmModal = $("#bs-modal-add");
                frmModal.find("#position_name").val(data.position_name);
                frmModal.find("#myLargeModalLabel").text("Edit data position");
                frmModal
                    .find("form")
                    .attr("action", "edit_position/" + position_id);
                frmModal.modal("show");
            },
            error: function (data) {
                console.log("Error:", data);
            },
        });
    });

    $(".btn-delete").click(function (e) {
        e.preventDefault();
        var position_id = $(this).data("id");
        var formId = "#frmDelete-" + position_id;
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

    $("#bs-modal-add").on("hidden.bs.modal", function () {
        $(this).find("#myLargeModalLabel").text("Add data position");
        $(this).find("form").attr("action", "save_position");
        $(this).find("form").trigger("reset");
    });
});
