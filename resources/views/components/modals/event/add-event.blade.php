
<div class="modal fade" id="addEvent" tabindex="-1" role="dialog" aria-labelledby="addTempleTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">Add New
                    Temple</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body add-modal">
                <form method="POST" action="{{ route('temple.add') }}" data-url="{{ route('temple.add') }}"
                    class="formSubmit fileUpload" enctype="multipart/form-data" id="UserForm">
                    @csrf
                    {{-- <input type="hidden" name="uuid" value=""> --}}
                    <div class="row">
                        <div class="col-md-6 my-2">
                            <div class="form-group">
                                <label for="name">Temple Name</label>
                                <input type="text" class="form-control" placeholder="Enter Client Name" id="name"
                                    name="name">
                            </div>
                        </div>
                        <div class="col-md-6 my-2">
                            <div class="form-group">
                                <label for="title">Title</label>
                                <input type="text" class="form-control" placeholder="Enter Temple Title" id="title"
                                    name="title">
                            </div>
                        </div>
                        <div class="col-md-6 my-2">
                            <div class="form-group">
                                <label for="country_id">Enter country</label>
                                <select id="country_id" name="country_id" class="form-control">
                                    <option value="">select</option>
                                    {{ getCountry('')}}
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6 my-2">
                            <div class="form-group">
                                <label for="state_id">Enter state_id ID</label>
                                <select id="state_id" name="state_id" class="form-control">
                                    <option value="">select</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6 my-2">
                            <div class="form-group">
                                <label for="city_id">Enter city_id ID</label>
                                <select id="city_id" name="city_id" class="form-control">
                                    <option value="">select</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6 my-2">
                            <div class="form-group">
                                <label for="postal_code">Enter postal_code ID</label>
                                <input type="number" class="form-control" placeholder="Enter postal_code ID"
                                    id="postal_code" name="postal_code">
                            </div>
                        </div>
                        <div class="col-md-6 my-2">
                            <div class="form-group">
                                <label for="phone_number">Enter phone_number ID</label>
                                <input type="number" class="form-control" placeholder="Enter phone_number ID"
                                    id="phone_number" name="phone_number">
                            </div>
                        </div>
                        <div class="col-md-6 my-2">
                            <div class="form-group">
                                <label for="email">Enter email ID</label>
                                <input type="email" class="form-control" placeholder="Enter email ID" id="email"
                                    name="email">
                            </div>
                        </div>
                        <div class="col-md-6 my-2">
                            <div class="form-group">
                                <label for="address">Enter address ID</label>
                                <input type="text" class="form-control" placeholder="Enter address ID" id="address"
                                    name="address">
                            </div>
                        </div>
                        <div class="col-md-6 my-2">
                            <div class="form-group">
                                <label for="description">Enter description ID</label>
                                <input type="text" class="form-control" placeholder="Enter description ID"
                                    id="description" name="description">
                            </div>
                        </div>
                        <div class="col-md-6 my-2">
                            <div class="form-group">
                                <label for="lat">Enter lat ID</label>
                                <input type="text" class="form-control" placeholder="Enter lat ID" id="lat" name="lat">
                            </div>
                        </div>
                        <div class="col-md-6 my-2">
                            <div class="form-group">
                                <label for="long">Enter long ID</label>
                                <input type="text" class="form-control" placeholder="Enter long ID" id="long"
                                    name="long">
                            </div>
                        </div>
                        <div class="col-md-6 my-2">
                            <div class="form-group">
                                <label for="openingsDay">Enter openingsDay ID</label>
                                <input type="date" class="form-control" placeholder="Enter openingsDay ID"
                                    id="openingsDay" name="openingsDay">
                            </div>
                        </div>
                        <div class="col-md-6 my-2">
                            <div class="form-group">
                                <label for="openingTime">Enter openingTime ID</label>
                                <input type="time" class="form-control" placeholder="Enter openingTime ID"
                                    id="openingTime" name="openingTime">
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
