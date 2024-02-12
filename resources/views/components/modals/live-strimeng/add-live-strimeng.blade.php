<div class="modal fade" id="addLiveStrimeng" tabindex="-1" role="dialog" aria-labelledby="addLiveStrimengTitle"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">Add Live Streaming</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body add-modal">
                <form method="POST" action="{{ route('streaming.add') }}" data-url="{{ route('streaming.add') }}"
                    class="formSubmit fileUpload" enctype="multipart/form-data" id="UserForm">
                    @csrf
                    <div class="row">
                        <div class="col-md-12 my-2">
                            <div class="form-group">
                                <label for="temple_id">Title<span class="pl-1 text-danger">*</span></label>
                                <input type="text" class="form-control" placeholder="Enter Title*" id="title" name="title">
                            </div>
                        </div>
                        <div class="col-md-6 my-2">
                            <div class="form-group">
                                <label for="temple_id">Select Temple<span class="pl-1 text-danger">*</span></label>
                                <select class="form-control" name="temple_id" id="temple_id">
                                    <option value="">Select Temple*</option>
                                    {{ getTemple('') }}
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6 my-2">
                            <div class="form-group">
                                <label for="puja_id">Select Puja<span class="pl-1 text-danger">*</span></label>
                                <select class="form-control " name="puja_id" id="puja_id">
                                    <option value="">Select Puja</option>
                                    {{ getPuja('') }}
                                </select>
                            </div>
                        </div>
                        <div class="col-md-12 my-2">
                            <div class="form-group">
                                <label for="live_url">Live Streaming URL<span class="pl-1 text-danger">*</span></label>
                                <input type="url" class="form-control" placeholder="Enter Live Streaming URL"
                                    id="live_url" name="live_url"  >
                            </div>
                        </div>
                        <div class="col-md-6 my-2">
                            <div class="form-group">
                                <label for="start_date">Enter Start Date <span class="pl-1 text-danger">*</span></label>
                                <input type="date" class="form-control"
                                    id="start_date" name="start_date">
                            </div>
                        </div>

                        <div class="col-md-6 my-2">
                            <div class="form-group">
                                <label for="start_time">Enter Start Time<span class="pl-1 text-danger">*</span></label>
                                <input type="time" class="form-control"
                                    id="start_time" name="start_time" step="1">

                            </div>
                        </div>
                        <div class="col-md-12 my-2">
                            <div class="form-group">
                                <label for="live_url">Live Streaming Thumbnail<span class="pl-1 text-danger">*</span></label>
                                <input type="file" class="form-control thumbnail_img" id="thumbnail_imgs"
                                    name="thumbnail_imgs" accept="image/*">
                            </div>
                        </div>
                        <div class="col display_picture d-none">
                            <div class="form-group">
                                <div class="uploadimage">
                                    <h4>
                                        <i class="fa mr-2" aria-hidden="true">
                                            <img src="{{ asset('thumbnail_img/') }}" alt="" width="75"
                                                height="75" id="display_picture"></i>Current Image
                                    </h4>
                                </div>
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
