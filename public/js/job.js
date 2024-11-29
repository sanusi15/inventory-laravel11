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
        var job_number = $(this).data("id");
        $.ajax({
            url: "show_job/" + job_number,
            type: "GET",
            dataType: "JSON",
            success: function (data) {
                var frmModal = $("#bs-modal-add");
                frmModal.find("#job_number").val(data.job_no);
                frmModal.find("#job_name").val(data.job_name);
                frmModal
                    .find("#job_status")
                    .val(data.job_status)
                    .trigger("change");
                frmModal.find("#myLargeModalLabel").text("Edit data job");
                frmModal.find("form").attr("action", "edit_job/" + job_number);
                frmModal.modal("show");
            },
            error: function (data) {
                console.log("Error:", data);
            },
        });
    });

    $(".btn-delete").click(function (e) {
        e.preventDefault();
        var job_no = $(this).data("id");
        var formId = "#frmDelete-" + job_no;
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
        $(this).find("#myLargeModalLabel").text("Add data job");
        $(this).find("form").attr("action", "save_job");
        $(this).find("form").trigger("reset");
    });
});
