var baseUrl = APP_URL + "/";
// alert(baseUrl);
$(document).on("click", ".editLiveStrimeng", function () {
    var uuid = $(this).data("uuid");
    // alert(uuid);
    $.ajax({
        url: baseUrl + "ajax/getLiveStrimeng/" + uuid,
        datatype: "json",
        type: "get",
        beforeSend: function () {},
    })
        .done(function (response) {
            if (response.data.length != 0) {
                $("#exampleModalLongTitle").text("Update Live Streaming");
                // alert("testttt");
                // console.log(response.data);
                $.each(response.data, function (key, value) {
                    // if (key == "liveStrimeng_uuid") {
                    //     $("#addLiveStrimeng #liveStrimeng")
                    //         .val(value)
                    //         .prop("selected", true);
                    // }
                    // if (key == "medium") {
                    //     $("#addLiveStrimeng #medium")
                    //         .val(value)
                    //         .prop("selected", true);
                    // }
                    if (key == "thumbnail_img") {
                        // alert("Please select");
                        $("#addLiveStrimeng #display_picture").prop(
                            "src",
                            baseUrl + "thumbnail_img/" + value
                        );
                        $(".display_picture").removeClass("d-none");
                    }
                    $("#" + key).val(value);
                });
                // localStorage.setItem('add-url',$('#addLiveStrimeng form').prop('action'));
                $("#addLiveStrimeng form").prop(
                    "action",
                    baseUrl + "streaming/edit/" + uuid
                );
                $("#addLiveStrimeng").modal("show");
            } else {
                showToast("error", "Live Strimeng", response.message);
            }
        })
        .fail(function (jqXHR, ajaxOptions, thrownError) {
            showToast("error", "Live Strimeng", "Something Went Wrong");
        });
});
