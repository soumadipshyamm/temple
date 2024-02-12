@extends('layouts.app', ['isSidebar' => true, 'isNavbar' => true, 'isFooter' => true])
@section('slider-active','active')
@section('title',__('Slider Images'))
@push('styles')
@endpush
@section('content')
<div class="dashboard-content">
    <div class="row">
        <!-- DashboardLeft Content -->
        <div class="col-lg-12">
            <div class="tablehead p-0">
                <h4>List of Slider Images</h4>
                <div class="tablehead-right">
                    <div class="viewtext mt-0">
                        <a href="{{ route('temple.list') }}" class="btn qrcode-list-btn mt-0" id="templeBack"><-Back</a>
                        <button type="button" class="btn qrcode-list-btn mt-0" data-toggle="modal"
                            data-target="#addSliderImg"><i class="fa fa-plus-circle" aria-hidden="true"></i> Add Slider Image</button>

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
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    {{-- {{ $data }} --}}
                                    @foreach ($data as$key=> $slidImg)
                                    <tr>
                                        <td><p>#{{ $key + 1 }}</p></td>
                                        <td>
                                            <img src="{{ asset('temple_img/'.$slidImg->file_name) }}" alt=""
                                            width="200px" height="100px">
                                        </td>
                                        <td>
                                            <div class="board-right">
                                                <a class="dropdown-item deleteData text-danger" data-uuid="{{ $slidImg->uuid }}"
                                                    data-table="images" href="javascript:void(0)"><i class="fa mr-1"
                                                        aria-hidden="true"><img src="{{asset('assets/img/feather-trash_icon.png')}}" alt=""></i></a>
                                            </div>
                                        </td>
                                    </tr>
                                    @endforeach
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
<x-modals.temple.add-slider-img />
{{--
<x-modals.puja.add-puja /> --}}
@endsection
@push('scripts')

<script src="{{ asset('assets/js/ajax/temple.js') }}"></script>
<script src="{{ asset('assets/js/ajax/submit.js') }}"></script>
@endpush
