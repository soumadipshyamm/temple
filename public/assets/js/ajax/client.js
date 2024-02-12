var baseUrl = APP_URL + "/";
// alert(baseUrl);
$(document).on("click", ".editClient", function () {
    var uuid = $(this).data("uuid");
    // alert(uuid);
    $.ajax({
        url: baseUrl + "ajax/getClient/" + uuid,
        datatype: "json",
        type: "get",
        beforeSend: function () {},
    })
        .done(function (response) {
            if (response.data.length != 0) {
                $.each(response.data, function (key, value) {
                    if (key == "client_uuid") {
                        $("#addClient #client")
                            .val(value)
                            .prop("selected", true);
                    }
                    if (key == "medium") {
                        $("#addClient #medium")
                            .val(value)
                            .prop("selected", true);
                    }
                    if (key == "display_picture") {
                        $("#addClient #display_picture").prop("src", value);
                        $(".display_picture").removeClass("d-none");
                    }
                    $("#" + key).val(value);
                });
                // localStorage.setItem('add-url',$('#addClient form').prop('action'));
                $("#addClient form").prop(
                    "action",
                    baseUrl + "client/edit/" + uuid
                );
                $("#addClient").modal("show");
            } else {
                showToast("error", "Client", response.message);
            }
        })
        .fail(function (jqXHR, ajaxOptions, thrownError) {
            showToast("error", "Client", "Something Went Wrong");
        });
});
