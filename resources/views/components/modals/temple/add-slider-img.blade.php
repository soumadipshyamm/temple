<div class="modal fade" id="addSliderImg" tabindex="-1" role="dialog" aria-labelledby="addSliderImgTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">Add Slider Images</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            @php
            $myurl = url()->current();
            $myurl = explode("/", $myurl);
            $urltoUuid= end($myurl);
            // print_r(end($myurl));
            @endphp
            <div class="modal-body add-modal">
                <form method="POST" action="{{ route('temple.addSliderImg') }}" data-url="{{ route('temple.addSliderImg') }}"
                    class="formSubmit fileUpload" enctype="multipart/form-data" id="UserForm">
                    @csrf
                    <input type="hidden" name="uuid" value="{{$urltoUuid ?? ''}}">
                    <div class="row">
                        {{-- <div class="col-md-6 my-2">
                            <div class="form-group">
                                <label for="name">Slider Image Title</label>
                                <input type="text" class="form-control" placeholder="Enter Slider Image Title" id="name"
                                name="name">
                            </div>
                        </div> --}}
                        <div class="col-md-6 my-2">
                            <div class="form-group">
                                <label for="temple_img">Upload Image</label>
                                <input type="file" class="form-control" id="temple_img" name="temple_img[]"  multiple="multiple" accept="image/*">
                                </div>
                        </div>
                    </div>
                    <div class="modal-footer justify-content-end">
                        <button type="reset" class="btn cancel-btn resetBtn" data-dismiss="modal">Cancel</button>
                        <button type="submit" class="btn save-btn">Save</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
