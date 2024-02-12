var baseUrl = APP_URL + "/";
// alert(baseUrl);
$(document).on("click", ".editRelevantWebsite", function () {
    var uuid = $(this).data("uuid");
    // alert(uuid);
    $.ajax({
        url: baseUrl + "ajax/getRelevantWebsite/" + uuid,
        datatype: "json",
        type: "get",
        beforeSend: function () {},
    })
        .done(function (response) {
            if (response.data.length != 0) {
                $("#exampleModalLongTitle").text("Update Relevant Websites");
                $.each(response.data, function (key, value) {
                    if (key == "puja_uuid") {
                        $("#addRelevantWebsite #relevantWebsite")
                            .val(value)
                            .prop("selected", true);
                    }
                    if (key == "medium") {
                        $("#addRelevantWebsite #medium")
                            .val(value)
                            .prop("selected", true);
                    }
                    if (key == "thumbnals") {
                        $("#addRelevantWebsite #display_picture").prop("src", baseUrl+'thumbnail_img/'+value);
                        $(".display_picture").removeClass("d-none");
                    }
                    $("#" + key).val(value);
                });
                // localStorage.setItem('add-url',$('#addRelevantWebsite form').prop('action'));
                $("#addRelevantWebsite form").prop(
                    "action",
                    baseUrl + "relevantWebsite/edit/" + uuid
                );
                $("#addRelevantWebsite").modal("show");
            } else {
                showToast("error", "Relevant Website", response.message);
            }
        })
        .fail(function (jqXHR, ajaxOptions, thrownError) {
            showToast("error", "Relevant Website", "Something Went Wrong");
        });
});
