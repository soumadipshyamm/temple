
<div class="modal fade" id="addSpecialEvent" tabindex="-1" role="dialog" aria-labelledby="addSpecialEventTitle"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">Add Special Event</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body add-modal">
                <form method="POST" action="{{ route('specialEvent.add') }}" data-url="{{ route('specialEvent.add') }}"
                    class="formSubmit fileUpload" enctype="multipart/form-data" id="UserForm">
                    @csrf
                    <div class="row">
                        <div class="col-md-12 my-2">
                            <div class="form-group">
                                <label for="name">Title<span class="pl-1 text-danger">*</span></label>
                                <input type="text" class="form-control" placeholder="Enter The Title" id="name" name="name">
                            </div>
                        </div>
                        <div class="col-md-6 my-2">
                            <div class="form-group">
                                <label for="temple_id">Temple<span class="pl-1 text-danger">*</span></label>
                                <select class="form-control" name="temple_id" id="temple_id">
                                    <option value="">Select Temple</option>
                                    {{ getTemple('') }}
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6 my-2">
                            <div class="form-group">
                                <label for="puja_id">Puja<span class="pl-1 text-danger">*</span></label>
                                <select class="form-control " name="puja_id" id="puja_id">
                                    <option value="">Select Puja</option>
                                    {{ getPuja('') }}
                                </select>
                            </div>
                        </div>
                        <div class="col-md-12 my-2">
                            <div class="form-group">
                                <label for="description">Description<span class="pl-1 text-danger">*</span></label>
                                <textarea class="form-control" placeholder="Enter Description" id="description"
                                    name="description" cols="30" rows="10"></textarea>
                            </div>
                        </div>
                        <div class="col-md-6 my-2">
                            <div class="form-group">
                                <label for="start_date">Enter Start Date <span class="pl-1 text-danger">*</span></label>
                                <input type="date" class="form-control" placeholder="Enter start_date " id="start_date"
                                    name="start_date">
                            </div>
                        </div>
                        <div class="col-md-6 my-2">
                            <div class="form-group">
                                <label for="end_date">Enter End Date<span class="pl-1 text-danger">*</span></label>
                                <input type="date" class="form-control" placeholder="Enter End Date" id="end_date"
                                    name="end_date">
                            </div>
                        </div>

                        <div class="col-md-6 my-2">
                            <div class="form-group">
                                <label for="start_time">Enter Start Time<span class="pl-1 text-danger">*</span></label>
                                <input type="time" class="form-control" placeholder="Enter Start Time" id="start_time"
                                    name="start_time"  step="1">
                            </div>
                        </div>
                        <div class="col-md-6 my-2">
                            <div class="form-group">
                                <label for="end_time">Enter End Time<span class="pl-1 text-danger">*</span></label>
                                <input type="time" class="form-control" placeholder="Enter End Time " id="end_time"
                                    name="end_time"  step="1">
                            </div>
                        </div>

                        <div class="col-md-12 my-2">
                            <div class="form-group">
                                <label for="live_url">Thumbnail<span class="pl-1 text-danger">*</span></label>
                                <input type="file" class="form-control thumbnail_img" id="thumbnail_imgs"
                                    name="thumbnail_imgs" accept="image/*" >
                            </div>
                        </div>
                        <div class="col display_picture d-none">
                            <div class="form-group">
                                <div class="uploadimage">
                                    <h4>
                                        <i class="fa mr-2" aria-hidden="true">
                                            <img src="{{ asset('thumbnail_img/168776394083.png') }}" alt="" width="75"
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
