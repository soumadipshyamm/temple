<div class="modal fade" id="addPuja" tabindex="-1" role="dialog" aria-labelledby="addTempleTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">Add New
                    Puja</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body add-modal">
                <form method="POST" action="{{ route('puja.add') }}" data-url="{{ route('puja.add') }}"
                    class="formSubmit fileUpload" enctype="multipart/form-data" id="UserForm">
                    @csrf
                    <div class="row">
                        <div class="col-md-6 my-2">
                            <div class="form-group">
                                <label for="name">Puja Name<span class="pl-1 text-danger">*</span></label>
                                <input type="text" class="form-control" placeholder="Enter Puja Name*" id="name"
                                    name="name">
                            </div>
                        </div>
                        {{-- <div class="col-md-6 my-2">
                            <div class="form-group">
                                <label for="title">Title</label>
                                <input type="text" class="form-control" placeholder="Enter Puja Title" id="title"
                                    name="title">
                            </div>
                        </div> --}}
                        <div class="col-md-6 my-2">
                            <div class="form-group">
                                <label for="temple_id">Select Temple<span class="pl-1 text-danger">*</span></label>
                                <select id="temple_id" name="temple_id" class="form-control">
                                    <option value="">Select Temple*</option>
                                    {{ getTemple('')}}
                                </select>
                            </div>
                        </div>
                        <div class="col-md-12 my-2">
                            <div class="form-group">
                                <label for="description">Enter Description<span class="pl-1 text-danger">*</span></label>
                                <textarea class="form-control" id="description" name="description" placeholder="Enter Description*"
                                    style="height: 100px;"></textarea>
                            </div>
                        </div>
                        <div class="col-md-6 my-2">
                            <div class="form-group">
                                <label for="puja_start_date">Enter Puja Start Date <span class="pl-1 text-danger">*</span></label>
                                <input type="date" class="form-control" placeholder="Enter puja start date *"
                                    id="puja_start_date" name="puja_start_date">
                            </div>
                        </div>
                        <div class="col-md-6 my-2">
                            <div class="form-group">
                                <label for="puja_end_date">Enter Puja End Date <span class="pl-1 text-danger">*</span></label>
                                <input type="date" class="form-control" placeholder="Enter puja end date *"
                                    id="puja_end_date" name="puja_end_date">
                            </div>
                        </div>
                        <div class="col-md-6 my-2">
                            <div class="form-group">
                                <label for="puja_start_time">Enter Puja Start Time<span class="pl-1 text-danger">*</span></label>
                                <input type="time" class="form-control"
                                    id="puja_start_time" name="puja_start_time"  step="1">
                            </div>
                        </div>
                        <div class="col-md-6 my-2">
                            <div class="form-group">
                                <label for="puja_end_time">Enter Puja End Time<span class="pl-1 text-danger">*</span></label>
                                <input type="time" class="form-control"  id="puja_end_time" name="puja_end_time"  step="1">
                            </div>
                        </div>
                        <div class="col-md-12 my-2">
                            <div class="form-group">
                                <label for="puja_img">Upload Image<span class="pl-1 text-danger">*</span></label>
                                <input type="file" class="form-control" id="puja_img" name="puja_img" accept="image/*" >
                            </div>
                            <div class="col display_picture d-none">
                                <div class="form-group">
                                    <div class="uploadimage">
                                        <i class="fa mr-2" aria-hidden="true">
                                            <img src="" alt="" width="75" height="75" id="display_picture"></i>Current
                                        Image
                                    </div>
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
