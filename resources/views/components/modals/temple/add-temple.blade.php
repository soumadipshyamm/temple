<div class="modal fade" id="addTemple" tabindex="-1" role="dialog" aria-labelledby="addTempleTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">Add Temple</h5>
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
                        <div class="col-md-12 my-2">
                            <div class="form-group">
                                <label for="name">Temple Name<span class="pl-1 text-danger">*</span></label>
                                <input type="text" class="form-control" placeholder="Enter Temple Name*"
                                    id="name" name="name">
                            </div>
                        </div>
                        {{-- <div class="col-md-6 my-2">
                            <div class="form-group">
                                <label for="title">Title</label>
                                <input type="text" class="form-control" placeholder="Enter Temple Title" id="title"
                                    name="title">
                            </div>
                        </div> --}}
                        @php
                            // dd($fetchIdExitOrNot);
                        @endphp
                        <div class="col-md-6 my-2">
                            <div class="form-group">
                                <label for="country_id">Enter Country<span class="pl-1 text-danger">*</span></label>

                                <select id="country_id" name="country_id" class="form-control">
                                    <option value="">Select</option>
                                    {{ getCountry('') }}
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6 my-2">
                            <div class="form-group">
                                <label for="state_id">Enter State<span class="pl-1 text-danger">*</span></label>
                                <select id="state_id" name="state_id" class="form-control">
                                    <option value="">Select</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6 my-2">
                            <div class="form-group">
                                <label for="city_id">Enter City<span class="pl-1 text-danger">*</span></label>
                                <select id="city_id" name="city_id" class="form-control">
                                    <option value="">Select</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6 my-2">
                            <div class="form-group">

                                <label for="postal_code">Enter Postal Code<span
                                        class="pl-1 text-danger">*</span></label>
                                <input type="number" class="form-control" placeholder="Enter postal_code*"
                                    id="postal_code" name="postal_code" maxlength="6" min="0">
                            </div>
                        </div>
                        <div class="col-md-6 my-2">
                            <div class="form-group">

                                <label for="phone_number">Enter Phone Number<span
                                        class="pl-1 text-danger">*</span></label>
                                <input type="number" class="form-control" placeholder="Enter phone_number*"
                                    id="phone_number" name="phone_number" maxlength="10" min="0">
                            </div>
                        </div>
                        <div class="col-md-6 my-2">
                            <div class="form-group">
                                <label for="email">Enter Email</label>
                                <input type="email" class="form-control" placeholder="Enter email" id="email"
                                    name="email">
                            </div>
                        </div>

                        <div class="col-md-6 my-2">
                            <div class="form-group">
                                <label for="lat">Enter Latitude <span class="pl-1 text-danger">*</span></label>
                                <input type="text" class="form-control" placeholder="Enter Latitude*" id="lat"
                                    name="lat">
                            </div>
                        </div>
                        <div class="col-md-6 my-2">
                            <div class="form-group">
                                <label for="long">Enter Longitude<span class="pl-1 text-danger">*</span> </label>
                                <input type="text" class="form-control" placeholder="Enter Longitude* "
                                    id="long" name="long">
                            </div>
                        </div>
                        <div class="col-md-6 my-2">
                            <div class="form-group">
                                <label for="thumbnail_imgs">Thumbnail Image<span
                                        class="pl-1 text-danger">*</span></label>
                                <input type="file" class="form-control" id="thumbnail_imgs" name="thumbnail_imgs"
                                    multiple="multiple" accept="image/*">
                            </div>
                            <div class="col display_picture d-none">
                                <div class="form-group">
                                    <div class="uploadimage">
                                        <i class="fa mr-2" aria-hidden="true">
                                            <img src="" alt="" width="75" height="75"
                                                id="display_picture"></i>Current
                                        Image
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 my-2">
                            <div class="form-group">
                                <label for="address">Enter Address<span class="pl-1 text-danger">*</span></label>
                                <textarea type="text" class="form-control" placeholder="Enter address*" id="address" name="address"
                                    style="height: 115px;"></textarea>
                            </div>
                        </div>
                        {{-- ********************************************************************** --}}
                        <div class="col-md-6 my-2">
                            <div class="form-group">
                                <label for="address">Consecrated Deity / Ies <span
                                        class="pl-1 text-danger">*</span></label>
                                <textarea type="text" class="form-control" placeholder="Enter Consecrated Deity* " id="consecrated_deity"
                                    name="consecrated_deity" style="height: 100px;"></textarea>
                            </div>
                        </div>
                        <div class="col-md-6 my-2">
                            <div class="form-group">
                                <label for="address">Temple Come Into Existence<span
                                        class="pl-1 text-danger">*</span></label>
                                <textarea type="text" class="form-control" placeholder="Enter Temple come into existence*" id="temple_existence"
                                    name="temple_existence" style="height: 100px;"></textarea>
                            </div>
                        </div>
                        <div class="col-md-6 my-2">
                            <div class="form-group">
                                <label for="address"> Special Poojas And Sevas A Devotee Can Offer At The
                                    Temple</label>
                                <textarea type="text" class="form-control"
                                    placeholder="Enter Special Poojas and Sevas a devotee can offer at the Temple*" id="special_poojas_sevas"
                                    name="special_poojas_sevas" style="height: 100px;"></textarea>
                            </div>
                        </div>

                        <div class="col-md-6 my-2">
                            <div class="form-group">
                                <label for="address">Accommodation For Devotees Near The Temple<span
                                        class="pl-1 text-danger">*</span><br><br></label>
                                <textarea type="text" class="form-control" placeholder="Enter Accommodation for devotees near the Temple*"
                                    id="accommodation" name="accommodation" style="height: 100px;"></textarea>
                            </div>
                        </div>

                        <div class="col-md-6 my-2">
                            <div class="form-group">
                                <label for="address">Transport For devotees to reach the Temple<span
                                        class="pl-1 text-danger">*</span></label>
                                <textarea type="text" class="form-control" placeholder="Enter Transport for devotees to reach the Temple*"
                                    id="temple_transport" name="temple_transport" style="height: 100px;"></textarea>
                            </div>
                        </div>
                        <div class="col-md-6 my-2">
                            <div class="form-group">
                                <label for="address">Temple Authority<span class="pl-1 text-danger">*</span></label>
                                <textarea type="text" class="form-control" placeholder="Enter Temple Authority*" id="temple_authority"
                                    name="temple_authority" style="height: 100px;"></textarea>
                            </div>
                        </div>
                        <div class="col-md-6 my-2">
                            <div class="form-group">

                                <label for="address"> Books and Magazines published by the Temple<span
                                        class="pl-1 text-danger">*</span></label>
                                <div class="eq-sec">
                                    <input type="radio" name="books_magazines" id="books_magazines"
                                        class="books_magazines" value="1">
                                    <label for="address">YES</label>
                                    <input type="radio" name="books_magazines" id="books_magazines"
                                        class="books_magazines" value="0">
                                    <label for="address">NO</label>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-6 my-2">
                            <div class="form-group">
                                <label for="address">Temple Authority To Receive Money Online In The Form Of Donations
                                    /
                                    Hundi<span class="pl-1 text-danger">*</span></label>
                                <div class="eq-sec">
                                    <input type="radio" name="temple_donations" id="temple_donations"
                                        value="1">
                                    <label for="address">YES</label>
                                    <input type="radio" name="temple_donations" id="temple_donations"
                                        value="0">
                                    <label for="address">NO</label>
                                </div>
                            </div>
                        </div>

                        {{-- *************************************************************** --}}
                        <div class="col-md-12 my-2">
                            <div class="form-group">
                                <label for="description">Description(Who started this Temple and why)<span
                                        class="pl-1 text-danger">*</span></label>
                                <textarea class="form-control" id="description" name="description"
                                    placeholder="Enter Description(Who started this Temple and why)*" style="height: 100px;"></textarea>
                            </div>
                        </div>
                        <div class="col-md-12 my-2">
                            <div class="form-group">
                                <label for="history">History<span class="pl-1 text-danger">*</span></label>
                                <textarea class="form-control" id="history" name="history" placeholder="Enter Temple History*"
                                    style="height: 100px;"></textarea>
                            </div>
                        </div>
                        <div class="col-md-12 my-2">
                            <div class="form-group">
                                <label for="rules">Rules<span class="pl-1 text-danger">*</span></label>
                                <textarea class="form-control" id="rules" name="rules" placeholder="Enter Temple Rules*"
                                    style="height: 100px;"></textarea>
                            </div>
                        </div>
                        <div class="col-md-12 my-2">
                            <div class="form-group">
                                <label for="tradition">Tradition</label>
                                <textarea class="form-control" id="tradition" name="tradition" placeholder="Enter Temple Tradition"
                                    style="height: 100px;"></textarea>
                            </div>
                        </div>
                        <div class="col-md-12 my-2">
                            <div class="form-group">
                                <label for="publication">Publication</label>
                                <textarea class="form-control" id="publication" name="publication" placeholder="Enter Temple Publication"
                                    style="height: 100px;"></textarea>
                            </div>
                        </div>
                        <div class="col-md-12 my-2">
                            <div class="form-group">
                                <label for="booking">Booking Url</label>
                                <input type="url" class="form-control" id="booking" name="booking"
                                    placeholder="Enter Booking Url https://...">
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
