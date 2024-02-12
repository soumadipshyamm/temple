@extends('layouts.app', ['isSidebar' => true, 'isNavbar' => true, 'isFooter' => true])
@section('banner-active','active')
@section('title',__('Banner'))
@push('styles')
<link href="{{ asset('css/app.css') }}" rel="stylesheet">
@endpush
@section('content')
<div class="dashboard-content">
    <div class="row">
        <!-- DashboardLeft Content -->
        <div class="col-lg-12">
            <div class="tablehead p-0">
                <h4>List of Banner</h4>
                <div class="tablehead-right">
                    <div class="viewtext mt-0">
                        <button type="button" class="btn qrcode-list-btn mt-0" data-toggle="modal"
                            data-target="#addBannerImg"><i class="fa fa-plus-circle" aria-hidden="true"></i> Add
                            Banner</button>
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
                                        <th>Temple Name</th>
                                        <th>Images</th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody class="gallery">
                                    {{-- @dd($datas); --}}
                                    @if($datas)
                                    @forelse($datas as $key => $data)
                                    <tr class="manage-enable">
                                        <td>
                                            <p>#{{ $key + 1 }}</p>
                                        </td>
                                        <td>
                                            <p>{{ $data->temple->name??'' }}</p>
                                        </td>
                                        <td>
                                            <img class="zoomable" src="{{ asset('banner_image/'.$data->banner_image) }}"
                                                alt="" width="150px" height="80px">
                                        </td>
                                        <td>
                                            <div class="board-right">
                                                {{-- <a class="dropdown-item editBanner" data-uuid="{{ $data->uuid }}"
                                                    href="javascript:void(0)">
                                                    <i class="fa mr-1" aria-hidden="true">
                                                        <img src="{{asset('assets/img/material-edit_icon.png')}}"
                                                            alt=""></i></a> --}}
                                                <a class="dropdown-item deleteData text-danger" data-uuid="{{ $data->uuid }}"
                                                    data-table="banners" href="javascript:void(0)">
                                                    <i class="fa mr-1" aria-hidden="true">
                                                        <img src="{{asset('assets/img/feather-trash_icon.png')}}"
                                                            alt=""></i></a>
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
<x-modals.banner.add-banner />
@endsection
@push('scripts')

<script src="{{ asset('js/app.js') }}"></script>
<script src="{{ asset('assets/js/ajax/banner.js') }}"></script>
<script src="{{ asset('assets/js/ajax/submit.js') }}"></script>
@endpush
