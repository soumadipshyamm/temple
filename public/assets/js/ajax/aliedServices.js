var baseUrl = APP_URL + "/";
// alert(baseUrl);
$(document).on("click", ".editAliedServices", function () {
    var uuid = $(this).data("uuid");
    // alert(uuid);
    $.ajax({
        url: baseUrl + "ajax/getAliedServices/" + uuid,
        datatype: "json",
        type: "get",
        beforeSend: function () {},
    })
        .done(function (response) {
            if (response.data.length != 0) {
                $("#exampleModalLongTitle").text("Update Allied Services");
                $.each(response.data, function (key, value) {
                    if (key == "puja_uuid") {
                        $("#addAlliedServices #alliedServices")
                            .val(value)
                            .prop("selected", true);
                    }
                    if (key == "medium") {
                        $("#addAlliedServices #medium")
                            .val(value)
                            .prop("selected", true);
                    }
                    if (key == "thumbnail_img") {
                        $("#addAlliedServices #display_picture").prop(
                            "src",
                            baseUrl + "thumbnail_img/" + value
                        );
                        $(".display_picture").removeClass("d-none");
                    }
                    $("#" + key).val(value);
                });
                // localStorage.setItem('add-url',$('#addAlliedServices form').prop('action'));
                $("#addAlliedServices form").prop(
                    "action",
                    baseUrl + "alliedServices/edit/" + uuid
                );
                $("#addAlliedServices").modal("show");
            } else {
                showToast("error", "Allied Services", response.message);
            }
        })
        .fail(function (jqXHR, ajaxOptions, thrownError) {
            showToast("error", "Allied Services", "Something Went Wrong");
        });
});

