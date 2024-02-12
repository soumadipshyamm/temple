var baseUrl = APP_URL + "/";
// alert(baseUrl);
$(document).on("click", ".editNews", function () {
    var uuid = $(this).data("uuid");
    // alert(uuid);
    $.ajax({
        url: baseUrl + "ajax/getNews/" + uuid,
        datatype: "json",
        type: "get",
        beforeSend: function () {},
    })
        .done(function (response) {
            if (response.data.length != 0) {
                $("#exampleModalLongTitle").text("Update News");
                $.each(response.data, function (key, value) {
                    if (key == "news_uuid") {
                        $("#addNews #news")
                            .val(value)
                            .prop("selected", true);
                    }
                    if (key == "medium") {
                        $("#addNews #medium")
                            .val(value)
                            .prop("selected", true);
                    }
                    if (key == "thumbnail_img") {
                        $("#addNews #display_picture").prop("src", baseUrl+'thumbnail_img/'+value);
                        $(".display_picture").removeClass("d-none");
                    }
                    $("#" + key).val(value);
                });
                // localStorage.setItem('add-url',$('#addNews form').prop('action'));
                $("#addNews form").prop(
                    "action",
                    baseUrl + "news/edit/" + uuid
                );
                $("#addNews").modal("show");
            } else {
                showToast("error", "News", response.message);
            }
        })
        .fail(function (jqXHR, ajaxOptions, thrownError) {
            showToast("error", "News", "Something Went Wrong");
        });
});
