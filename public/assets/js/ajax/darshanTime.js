var baseUrl = APP_URL + "/";
// alert(baseUrl);
$(document).ready(function () {
    var i = 0;
    $("#dynamic-ar").on('click',function () {
        ++i;
        $("#dynamicAddRemove").append('<div class="row darshan-time"><div class="col-md-2 my-2"><div class="form-group"><input type="time" name="start_time[]" placeholder="Enter subject" class="form-control" value="00:00:00" step="1" /></div></div><div class="col-md-2 my-2"><div class="form-group"> <input type="time" name="end_time[]" placeholder="Enter subject"class="form-control" value="00:00:00" step="1"/> </div></div><div class="col-md-3 my-2"><div class="form-group"><input type="text" name="title[]" placeholder="Enter subject"class="form-control" /></div></div><div class="col-md-4 my-2"><div class="form-group"><textarea name="description[]" id="addMoreInputFields" cols=""rows="2" class="form-control"></textarea></div></div><div class="col-md-1 my-2"><div class="form-group"><button type="button" class="btn btn-outline-danger remove-input-field">Delete</button></div></div></div>');
    });
    $(document).on('click', '.remove-input-field', function () {
        // $(this).parents('tr').remove();
        console.log($(this).parent().parent().parent().remove());
    });
});
