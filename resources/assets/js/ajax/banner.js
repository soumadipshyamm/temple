var baseUrl = APP_URL + "/";
// alert(baseUrl);
$(document).on("click", ".editBanner", function () {
    var uuid = $(this).data("uuid");
    // alert(uuid);
    $.ajax({
        url: baseUrl + "ajax/getBanner/" + uuid,
        datatype: "json",
        type: "get",
        beforeSend: function () {},
    })
        .done(function (response) {
            console.log(response);
            if (response.data.length != 0) {
                $("#exampleModalLongTitle").text("Update Banner");
                $.each(response.data, function (key, value) {
                    if (key == "banner_uuid") {
                        $("#addBannerImg #banner")
                            .val(value)
                            .prop("selected", true);
                    }
                    if (key == "medium") {
                        $("#addBannerImg #medium")
                            .val(value)
                            .prop("selected", true);
                    }
                    if (key == "file_name") {
                        $("#addBannerImg #file_name").prop("src", value);
                        $(".file_name").removeClass("d-none");
                    }
                    $("#" + key).val(value);
                });
                // localStorage.setItem('add-url',$('#addBannerImg form').prop('action'));
                $("#addBannerImg form").prop(
                    "action",
                    baseUrl + "banner/edit/" + uuid
                );
                $("#addBannerImg").modal("show");
            } else {
                showToast("error", "Banner", response.message);
            }
        })
        .fail(function (jqXHR, ajaxOptions, thrownError) {
            showToast("error", "Banner", "Something Went Wrong");
        });
});
