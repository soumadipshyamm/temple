var baseUrl = APP_URL + "/";
// alert(baseUrl);
$(document).on("click", ".editFestivals", function () {
    var uuid = $(this).data("uuid");
    // alert(uuid);
    $.ajax({
        url: baseUrl + "ajax/getFestivals/" + uuid,
        datatype: "json",
        type: "get",
        beforeSend: function () {},
    })
        .done(function (response) {
            if (response.data.length != 0) {
                $("#exampleModalLongTitle").text("Update Festival");
                $.each(response.data, function (key, value) {
                    if (key == "festival_uuid") {
                        $("#addFestival #festival")
                            .val(value)
                            .prop("selected", true);
                    }
                    if (key == "medium") {
                        $("#addFestival #medium")
                            .val(value)
                            .prop("selected", true);
                    }
                    if (key == "thumbnail_img") {
                        $("#addFestival #display_picture").prop(
                            "src",
                            baseUrl + "thumbnail_img/" + value
                        );
                        $(".display_picture").removeClass("d-none");
                    }
                    $("#" + key).val(value);
                });
                // localStorage.setItem('add-url',$('#addFestival form').prop('action'));
                $("#addFestival form").prop(
                    "action",
                    baseUrl + "festival/edit/" + uuid
                );
                $("#addFestival").modal("show");
            } else {
                showToast("error", "Festivals", response.message);
            }
        })
        .fail(function (jqXHR, ajaxOptions, thrownError) {
            showToast("error", "Festivals", "Something Went Wrong");
        });
});
