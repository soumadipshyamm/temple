var baseUrl = APP_URL + "/";
// alert(baseUrl);
$(document).on("click", ".editSocialServices", function () {
    var uuid = $(this).data("uuid");
    // alert(uuid);
    $.ajax({
        url: baseUrl + "ajax/getSocialServices/" + uuid,
        datatype: "json",
        type: "get",
        beforeSend: function () {},
    })
        .done(function (response) {
            if (response.data.length != 0) {
                $("#exampleModalLongTitle").text("Update Social Services");
                $.each(response.data, function (key, value) {
                    if (key == "SocialServices_uuid") {
                        $("#addSocialServices #SocialServices")
                            .val(value)
                            .prop("selected", true);
                    }
                    if (key == "medium") {
                        $("#addSocialServices #medium")
                            .val(value)
                            .prop("selected", true);
                    }
                    if (key == "thumbnail_img") {
                        $("#addSocialServices #display_picture").prop("src", baseUrl+'thumbnail_img/'+value);
                        $(".display_picture").removeClass("d-none");
                    }
                    $("#" + key).val(value);
                });
                // localStorage.setItem('add-url',$('#addSocialServices form').prop('action'));
                $("#addSocialServices form").prop(
                    "action",
                    baseUrl + "socialServices/edit/" + uuid
                );
                $("#addSocialServices").modal("show");
            } else {
                showToast("error", "Special Event", response.message);
            }
        })
        .fail(function (jqXHR, ajaxOptions, thrownError) {
            showToast("error", "Special Event", "Something Went Wrong");
        });
});
