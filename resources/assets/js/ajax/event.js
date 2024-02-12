var baseUrl = APP_URL + "/";
// alert(baseUrl);
$(document).on("click", ".editEvent", function () {
    var uuid = $(this).data("uuid");
    alert(uuid);
    $.ajax({
        url: baseUrl + "ajax/getEvent/" + uuid,
        datatype: "json",
        type: "get",
        beforeSend: function () {},
    })
        .done(function (response) {
            if (response.data.length != 0) {
                $("#exampleModalLongTitle").text("Update Events");
                $.each(response.data, function (key, value) {
                    if (key == "event_uuid") {
                        $("#addEvent #event")
                            .val(value)
                            .prop("selected", true);
                    }
                    if (key == "medium") {
                        $("#addEvent #medium")
                            .val(value)
                            .prop("selected", true);
                    }
                    if (key == "display_picture") {
                        $("#addEvent #display_picture").prop("src", value);
                        $(".display_picture").removeClass("d-none");
                    }
                    $("#" + key).val(value);
                });
                // localStorage.setItem('add-url',$('#addEvent form').prop('action'));
                $("#addEvent form").prop(
                    "action",
                    baseUrl + "event/edit/" + uuid
                );
                $("#addEvent").modal("show");
            } else {
                showToast("error", "Event", response.message);
            }
        })
        .fail(function (jqXHR, ajaxOptions, thrownError) {
            showToast("error", "Event", "Something Went Wrong");
        });
});
