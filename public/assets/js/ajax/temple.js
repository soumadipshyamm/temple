var baseUrl = APP_URL + "/";
// alert(baseUrl);
$(document).on("click", ".editTemple", function () {
    var uuid = $(this).data("uuid");
    // alert(uuid);
    $.ajax({
        url: baseUrl + "ajax/getTemple/" + uuid,
        datatype: "json",
        type: "get",
        beforeSend: function () {},
    })
        .done(function (response) {
            if (response.data.length != 0) {
                $("#exampleModalLongTitle").text("Update Temple");
                console.log(response.data.country_id);
                // console.log(response.data.state_id);
                $("#country_id")
                    .val(response.data.country_id)
                    .prop("selected", true)
                    .trigger("change");
                // getState();
                setTimeout(function () {
                    $("#state_id")
                        .val(response.data.state_id)
                        .prop("selected", true)
                        .trigger("change");
                    setTimeout(function () {
                        $("#city_id")
                            .val(response.data.city_id)
                            .prop("selected", true);
                    }, 1000);
                }, 1000);
                $(
                    "input:radio[value=" +
                        response.data.books_magazines +
                        "][name=books_magazines]"
                ).prop("checked", true);
                $(
                    "input:radio[value=" +
                        response.data.temple_donations +
                        "][name=temple_donations]"
                ).prop("checked", true);
                $.each(response.data, function (key, value) {
                    if (key == "img") {
                        $("#addTemple #display_picture").prop(
                            "src",
                            baseUrl + "thumbnail_img/" + value
                        );
                        $(".display_picture").removeClass("d-none");
                    }

                    $("#" + key).val(value);
                });
                // localStorage.setItem('add-url',$('#addTemple form').prop('action'));
                $("#addTemple form").prop(
                    "action",
                    baseUrl + "temple/edit/" + uuid
                );
                $("#addTemple").modal("show");
            } else {
                showToast("error", "Temple", response.message);
            }
        })
        .fail(function (jqXHR, ajaxOptions, thrownError) {
            showToast("error", "Temple", "Something Went Wrong");
        });
});
