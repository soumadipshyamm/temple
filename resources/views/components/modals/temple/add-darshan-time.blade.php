<div class="modal fade" id="addDarshanTime" tabindex="-1" role="dialog" aria-labelledby="addDarshanTimeTitle"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">Add Darshan Time</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <div class="modal-body add-modal">
                <form method="POST" action="{{ route('temple.addDarshanTime') }}"
                    data-url="{{ route('temple.addDarshanTime') }}" class="formSubmit fileUpload"
                    enctype="multipart/form-data" id="UserForm">
                    @csrf
                    <input type="hidden" name="uuid" value="{{ request()->uuid ?? ''}}">

                    <div id="dynamicAddRemove">
                        <div class="row">
                            <div class="col-md-2 my-2">
                                <div class="form-group">
                                    <label for="name">Start Time<span class="pl-1 text-danger">*</span></label>
                                    <input type="time" name="start_time[]"
                                        placeholder="Enter subject" class="form-control"  step="1" required />
                                </div>
                            </div>
                            <div class="col-md-2 my-2">
                                <div class="form-group">
                                    <label for="temple_img">End Time<span class="pl-1 text-danger">*</span></label>
                                    <input type="time" name="end_time[]"
                                        placeholder="Enter subject" class="form-control"  step="1" required/>
                                </div>
                            </div>
                            <div class="col-md-3 my-2">
                                <div class="form-group">
                                    <label for="temple_img">Title<span class="pl-1 text-danger">*</span></label>
                                    <input type="text" name="title[]"
                                        placeholder="Enter subject*" class="form-control" required/>
                                </div>
                            </div>
                            <div class="col-md-4 my-2">
                                <div class="form-group">
                                    <label for="temple_img">Description<span class="pl-1 text-danger">*</span></label>
                                    <textarea name="description[]" id="addMoreInputFields" cols=""
                                        rows="2" class="form-control" placeholder="Enter Description*" required></textarea>
                                </div>
                            </div>
                            <!--<div class="col-md-1 my-2">-->
                            <!--    <div class="form-group">-->
                            <!--        <label for="temple_img"></label>-->
                            <!--        <button type="button" name="add" onclick="addFunction(this.value)" id="dynamic-ar"-->
                            <!--            class="btn btn-outline-primary">Add</button>-->
                            <!--    </div>-->
                            <!--</div>-->
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
