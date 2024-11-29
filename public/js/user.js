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
});
