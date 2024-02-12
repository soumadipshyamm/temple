<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Laravel 8 Add/Remove Multiple Input Fields Example</title>
    <!-- CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
      .container {
            max-width: 600px;
        }
    </style>
</head>
<body>
    <div class="container">
        <form method="POST" action="{{ route('test.add') }}"
                    data-url="{{ route('test.add') }}" class="formSubmit fileUpload"
                    enctype="multipart/form-data" id="UserForm">
            @csrf
            @if ($errors->any())
            <div class="alert alert-danger" role="alert">
                <ul>
                    @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
            @endif
            @if (Session::has('success'))
            <div class="alert alert-success text-center">
                <p>{{ Session::get('success') }}</p>
            </div>
            @endif
            <table class="table table-bordered" id="dynamicAddRemove">
                <tr>
                    <th>Subject</th>
                    <th>Action</th>
                </tr>
                <tr>
                    <td><input type="text" name="addMoreInputFields1[0][subject]" placeholder="Enter subject" class="form-control" /></td>
                    <td><input type="text" name="addMoreInputFields2[0][subject]" placeholder="Enter subject" class="form-control" /></td>
                    <td><input type="text" name="addMoreInputFields3[0][subject]" placeholder="Enter subject" class="form-control" /></td>
                    <td><textarea name="addMoreInputFields4[0][subject]" id="addMoreInputFields" cols="" rows="2" class="form-control"></textarea></td>
                    <td><button type="button" name="add" id="dynamic-ar" class="btn btn-outline-primary">Add Subject</button></td>
                </tr>
            </table>
            <button type="submit" class="btn btn-outline-success btn-block">Save</button>
         {{-- <a href="submit" type="submit" value="submit"> submit</a> --}}
        </form>
    </div>
</body>
<!-- JavaScript -->
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js"></script>
<script type="text/javascript">
    var i = 0;
    $("#dynamic-ar").click(function () {
        ++i;
        $("#dynamicAddRemove").append('<tr><td><input type="text" name="addMoreInputFields1[' + i +'][subject1]" placeholder="Enter subject" class="form-control" /></td><td><input type="text" name="addMoreInputFields2[' + i +'][subject2]" placeholder="Enter subject" class="form-control" /></td><td><input type="text" name="addMoreInputFields3[' + i +'][subject3]" placeholder="Enter subject" class="form-control" /></td><td><textarea name="addMoreInputFields4[' + i +'][subject4]" id="addMoreInputFields" cols="" rows="2" class="form-control"></textarea></td><td><button type="button" class="btn btn-outline-danger remove-input-field">Delete</button></td></tr>'
            );
    });
    $(document).on('click', '.remove-input-field', function () {
        $(this).parents('tr').remove();
    });
</script>
</html>
