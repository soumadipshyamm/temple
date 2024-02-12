@extends('layouts.app', ['isSidebar' => true, 'isNavbar' => true, 'isFooter' => true])
@section('slider-active','active')
@section('title',__('Slider Images'))
@push('styles')
<style>
    .modal-dialog {
    max-width: 90%;
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
                <h4>List of Darshan Time</h4>
                <div class="tablehead-right">
                    <div class="viewtext mt-0">
                        <a href="{{ route('temple.list') }}" class="btn qrcode-list-btn mt-0" id="templeBack"><-Back</a>
                        <button type="button" class="btn qrcode-list-btn mt-0" data-toggle="modal"
                            data-target="#addDarshanTime"><i class="fa fa-plus-circle" aria-hidden="true"></i> Add Darshan Time</button>
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
                                        <th>Start Time</th>
                                        <th>End Time</th>
                                        <th>Title</th>
                                        <th>Description</th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    {{-- {{ $data }} --}}
                                    @forelse ($data as $key => $darshnaTime)
                                    <tr>
                                        <td>
                                            <p>#{{ $key + 1 }}</p>
                                        </td>
                                        <td>
                                            {{ \Carbon\Carbon::createFromFormat('H:i:s', $darshnaTime->start_time)->format('h:i
                                            A')}}


                                        </td>
                                        <td>
                                            {{ \Carbon\Carbon::createFromFormat('H:i:s', $darshnaTime->end_time)->format('h:i
                                            A')}}


                                        </td>
                                        <td>
                                            {{ $darshnaTime->title }}
                                        </td>
                                        <td>
                                            {{ $darshnaTime->description }}
                                        </td>
                                        <td>
                                            <div class="board-right">
                                                <a class="dropdown-item deleteData text-danger" data-uuid="{{ $darshnaTime->uuid }}"
                                                    data-table="darshan_times" href="javascript:void(0)"><i class="fa mr-1"
                                                        aria-hidden="true"><img
                                                            src="{{asset('assets/img/feather-trash_icon.png')}}"
                                                            alt=""></i></a>
                                            </div>
                                        </td>
                                    </tr>
                                    @empty

                                    @endforelse
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
<x-modals.temple.add-darshan-time />
{{--
<x-modals.puja.add-puja /> --}}
@endsection
@push('scripts')

<script src="{{ asset('assets/js/ajax/darshanTime.js') }}"></script>
<script src="{{ asset('assets/js/ajax/submit.js') }}"></script>


@endpush
