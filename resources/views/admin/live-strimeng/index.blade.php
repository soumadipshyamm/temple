@extends('layouts.app', ['isSidebar' => true, 'isNavbar' => true, 'isFooter' => true])
@section('live-strimeng-active','active')
@section('title',__('Live Strimeng'))
@push('styles')
@endpush
@section('content')
<div class="dashboard-content">
    <div class="row">
        <!-- DashboardLeft Content -->
        <div class="col-lg-12">
            <div class="tablehead p-0">
                <h4>List of Live Streaming</h4>
                <div class="tablehead-right">
                    <div class="viewtext mt-0">
                        <button type="button" class="btn qrcode-list-btn mt-0" data-toggle="modal"
                            data-target="#addLiveStrimeng"><i class="fa fa-plus-circle" aria-hidden="true"></i> Add Live
                            Streaming</button>
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
                                        <th>Puja Name</th>
                                        <th>Start Date</th>
                                        <th>Start Time</th>
                                        <th>Live Streaming Link</th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @if($datas)
                                    @forelse($datas as $key => $data)
                                    <tr class="manage-enable">
                                        <td>
                                            <p>#{{ $key + 1 }}</p>
                                        </td>
                                        <td>
                                            <img src="{{ asset('thumbnail_img/'.$data->thumbnail_img) }}" alt=""
                                                width="100px" height="80px">
                                        </td>
                                        <td>
                                            <p>{{ $data->temple->name }}</p>
                                        </td>
                                        <td>
                                            <p>{{ $data->puja->name }}</p>
                                        </td>

                                        <td>
                                            {{ \Carbon\Carbon::createFromFormat('Y-m-d', $data->start_date)->format('d F
                                            Y')}}
                                        </td>

                                        <td>
                                            {{ \Carbon\Carbon::createFromFormat('H:i:s', $data->start_time)->format('h:i
                                            A')}}
                                        </td>

                                        <td>
                                            <p>{{ $data->live_url }}</p>
                                        </td>
                                        <td>
                                            <div class="board-right">
                                                <a class="dropdown-item editLiveStrimeng" data-uuid="{{ $data->uuid }}"
                                                    href="javascript:void(0)"><i class="fa mr-1" aria-hidden="true"><img
                                                            src="{{asset('assets/img/material-edit_icon.png')}}"
                                                            alt=""></i></a>
                                                <a class="dropdown-item deleteData text-danger"
                                                    data-uuid="{{ $data->uuid }}" data-table=" live_streamings"
                                                    href="javascript:void(0)"><i class="fa mr-1" aria-hidden="true"><img
                                                            src="{{asset('assets/img/feather-trash_icon.png')}}"
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
<x-modals.live-strimeng.add-live-strimeng />
@endsection
@push('scripts')
<script src="{{ asset('assets/js/ajax/liveStreaming.js') }}"></script>
<script src="{{ asset('assets/js/ajax/submit.js') }}"></script>
@endpush