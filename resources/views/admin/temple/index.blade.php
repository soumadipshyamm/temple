@extends('layouts.app', ['isSidebar' => true, 'isNavbar' => true, 'isFooter' => true])
@section('temple-active','active')
@section('title',__('Temple'))
@push('styles')
<style>
    .modal-dialog {
        max-width: 60%;
        margin: 1.75rem auto;
    }

</style>
@endpush
@section('content')
<div class="dashboard-content">
    <div class="row">
        <!-- DashboardLeft Content -->
        <div class="col-lg-12">
            <div class="tablehead p-0">
                <h4>List of Temple</h4>
                <div class="tablehead-right">
                    <div class="viewtext mt-0">
                        <button type="button" class="btn qrcode-list-btn mt-0" data-toggle="modal" data-target="#addTemple"><i class="fa fa-plus-circle" aria-hidden="true"></i> Add New
                            Temple</button>
                    </div>
                    <!-- Modal -->
                </div>
            </div>
            <div class="dash-recentused dashpadding_box mt-4">
                <!-- Tab panes -->
                <div class="tab-content">
                    <div id="home" class="container tab-pane active p-0">
                        <div class="table-responsive">
                            <table class="table dataTable">
                                <thead>
                                    <tr class="manage-bg-dark">
                                        <th>SL No.</th>
                                        <th>Thumbnail</th>
                                        <th>Temple Name</th>
                                        <th>Country</th>
                                        <th>State </th>
                                        <th>City</th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @if($temples)
                                    @forelse($temples as $key => $temple)
                                    <tr class="manage-enable">
                                        <td>
                                            <p>#{{ $key + 1 }}</p>
                                        </td>
                                        <td>
                                            <img src="{{asset('thumbnail_img/'. $temple->img) }}" alt="" width="100px" height="80px">
                                        </td>
                                        <td>
                                            <p>{{ $temple->name }}</p>
                                        </td>
                                        <td>
                                            <p>{{$temple->city->state->country->name }}</p>
                                        </td>
                                        <td>
                                            <p>{{$temple->city->state->name }}</p>
                                        </td>
                                        <td>
                                            <p>{{$temple->city->name }}</p>
                                        </td>
                                        <td>
                                            <div class="dropdown show">
                                                <a class="btn" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                    <i class="fas fa-ellipsis-v"></i>
                                                </a>
                                                <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                                                    <a class="dropdown-item editTemple" data-uuid="{{ $temple->uuid }}" href="javascript:void(0)" title="Edit">
                                                        <i class="fas fa-edit"></i>
                                                    </a>
                                                    <a class="dropdown-item deleteData text-danger" data-uuid="{{ $temple->uuid }}" data-table="temples" href="javascript:void(0)" title="Delete">
                                                        <i class="fas fa-trash-alt"></i>
                                                    </a>
                                                    <a class="dropdown-item sliderImgTemple" data-uuid="{{ $temple->uuid }}" href="{{route('temple.sliderImg',$temple->uuid)}}" title="Slider Images ">
                                                        <i class="fas fa-image"></i>
                                                    </a>
                                                    <a class="dropdown-item " data-uuid="{{ $temple->uuid }}" href="{{route('temple.darshanTime',$temple->uuid)}}" title="Darshan Time">
                                                        <i class="far fa-clock"></i>
                                                    </a>
                                                    <a class="dropdown-item " data-uuid="{{ $temple->uuid }}" href="{{route('temple.viewDetails',$temple->uuid)}}" title="Details">
                                                        <i class="fas fa-eye"></i>
                                                    </a>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                    @empty

                                    @endforelse
                                    @endif
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- DashboardLeft Content -->
    </div>
</div><!-- Dashboard Content End -->
<x-modals.temple.add-temple />
{{-- <x-modals.puja.add-puja /> --}}
@endsection
@push('scripts')
{{-- <script src="//cdn.ckeditor.com/4.14.1/standard/ckeditor.js"></script> --}}
<script type="text/javascript">
    // $(document).ready(function() {
    //     $('.ckeditor').ckeditor();
    // });

</script>
<script>
    var baseUrl = APP_URL + "/";
    function getState() {
        var idCountry =$("#country_id").val();
        $("#state_id").html("");
        $.ajax({
            url: baseUrl + "api/fetch-states"
            , type: "POST"
            , data: {
                country_id: idCountry
                , _token: "{{csrf_token()}}"
            , }
            , dataType: "json"
            , success: function(result) {
                $("#state_id").html(
                    '<option value="">-- Select State --</option>'
                );
                $.each(result.states, function(key, value) {
                    $("#state_id").append(
                        '<option value="' +
                        value.id +
                        '">' +
                        value.name +
                        "</option>"
                    );
                });
                $("#city_id").html(
                    '<option value="">-- Select City --</option>'
                );
            }
        , });

    }
    $("#country_id").on("change", function() {
        getState();
    });

    /*------------------------------------------
    --------------------------------------------
    State Dropdown Change Event
    --------------------------------------------
    --------------------------------------------*/
    $("#state_id").on("change", function() {
        var idState = this.value;
        $("#city_id").html("");
        $.ajax({
            url: "{{url('api/fetch-cities')}}"
            , type: "POST"
            , data: {
                state_id: idState
                , _token: "{{csrf_token()}}"
            , }
            , dataType: "json"
            , success: function(res) {
                $("#city_id").html(
                    '<option value="">-- Select City --</option>'
                );
                $.each(res.cities, function(key, value) {
                    $("#city_id").append(
                        '<option value="' +
                        value.id +
                        '">' +
                        value.name +
                        "</option>"
                    );
                });
            }
        , });
    });

</script>
<script src="{{ asset('assets/js/ajax/temple.js') }}"></script>
<script src="{{ asset('assets/js/ajax/submit.js') }}"></script>
@endpush
