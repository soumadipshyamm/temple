var baseUrl = APP_URL + "/";
// alert(baseUrl);
$(document).on("click", ".editDonation", function () {
    var uuid = $(this).data("uuid");
    // alert(uuid);
    $.ajax({
        url: baseUrl + "ajax/getDonation/" + uuid,
        datatype: "json",
        type: "get",
        beforeSend: function () {},
    })
        .done(function (response) {
            if (response.data.length != 0) {
                $("#exampleModalLongTitle").text("Update Donation");
                $.each(response.data, function (key, value) {
                if (key == "puja_uuid") {
                        $("#addDonation #donation")
                            .val(value)
                            .prop("selected", true);
                    }
                    if (key == "medium") {
                        $("#addDonation #medium")
                            .val(value)
                            .prop("selected", true);
                    }
                    if (key == "thumbnail_img") {
                        $("#addDonation #display_picture").prop("src", baseUrl+'thumbnail_img/'+value);
                        $(".display_picture").removeClass("d-none");
                    }
                    $("#" + key).val(value);
                });
                // localStorage.setItem('add-url',$('#addDonation form').prop('action'));
                $("#addDonation form").prop(
                    "action",
                    baseUrl + "donation/edit/" + uuid
                );
                $("#addDonation").modal("show");
            } else {
                showToast("error", "Donation", response.message);
            }
        })
        .fail(function (jqXHR, ajaxOptions, thrownError) {
            showToast("error", "Donation", "Something Went Wrong");
        });
});
