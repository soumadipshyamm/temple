<div class="modal fade" id="addRelevantWebsite" tabindex="-1" role="dialog" aria-labelledby="addRelevantWebsiteTitle"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">Add Relevant Websites</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body add-modal">
                <form method="POST" action="{{ route('relevantWebsite.add') }}"
                    data-url="{{ route('relevantWebsite.add') }}" class="formSubmit fileUpload"
                    enctype="multipart/form-data" id="UserForm">
                    @csrf
                    <div class="row">
                        <div class="col-md-6 my-2">
                            <div class="form-group">
                                <label for="temple_id">Website Name<span class="pl-1 text-danger">*</span></label>
                                <input type="text" class="form-control" placeholder="Enter Title*" id="title"
                                    name="title">
                            </div>
                        </div>
                        <div class="col-md-6 my-2">
                            <div class="form-group">
                                <label for="temple_id">Temple<span class="pl-1 text-danger">*</span></label>
                                <select class="form-control" name="temple_id" id="temple_id">
                                    <option value="">Select Temple*</option>
                                    {{ getTemple('') }}
                                </select>
                            </div>
                        </div>

                        <div class="col-md-12 my-2">
                            <div class="form-group">
                                <label for="live_url">Website URL<span class="pl-1 text-danger">*</span></label>
                                <input type="url" class="form-control" placeholder="Enter Website URL*"
                                id="url" name="url">
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
