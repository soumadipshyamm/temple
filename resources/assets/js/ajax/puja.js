var baseUrl = APP_URL + "/";
// alert(baseUrl);
$(document).on("click", ".editPuja", function () {
    var uuid = $(this).data("uuid");
    // alert(uuid);
    $.ajax({
        url: baseUrl + "ajax/getPuja/" + uuid,
        datatype: "json",
        type: "get",
        beforeSend: function () {},
    })
        .done(function (response) {
            if (response.data.length != 0) {
                $("#exampleModalLongTitle").text("Update Puja");
                $.each(response.data, function (key, value) {
                    if (key == "puja_uuid") {
                        $("#addPuja #puja")
                            .val(value)
                            .prop("selected", true);
                    }
                    if (key == "medium") {
                        $("#addPuja #medium")
                            .val(value)
                            .prop("selected", true);
                    }
                    if (key == "thumbnals") {
                        $("#addPuja #display_picture").prop("src", baseUrl+'thumbnail_img/'+value);
                        $(".display_picture").removeClass("d-none");
                    }
                    $("#" + key).val(value);
                });
                // localStorage.setItem('add-url',$('#addPuja form').prop('action'));
                $("#addPuja form").prop(
                    "action",
                    baseUrl + "puja/edit/" + uuid
                );
                $("#addPuja").modal("show");
            } else {
                showToast("error", "Puja", response.message);
            }
        })
        .fail(function (jqXHR, ajaxOptions, thrownError) {
            showToast("error", "Puja", "Something Went Wrong");
        });
});
