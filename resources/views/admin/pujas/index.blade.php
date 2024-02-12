@extends('layouts.app', ['isSidebar' => true, 'isNavbar' => true, 'isFooter' => true])
@section('puja-active','active')
@section('title',__('Puja'))
@push('styles')
@endpush
@section('content')
<div class="dashboard-content">
    <div class="row">
        <!-- DashboardLeft Content -->
        <div class="col-lg-12">
            <div class="tablehead p-0">
                <h4>List of Puja</h4>
                <div class="tablehead-right">
                    <div class="viewtext mt-0">
                        <button type="button" class="btn qrcode-list-btn mt-0" data-toggle="modal"
                            data-target="#addPuja"><i class="fa fa-plus-circle" aria-hidden="true"></i> Add New
                            Puja</button>
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
                                        {{-- <th>Title</th> --}}
                                        <th>Start Date</th>
                                        <th>End Date</th>
                                        <th>Start Time</th>
                                        <th>End Time</th>
                                        <th>Description</th>
                                        {{-- <th>live Strimeng</th> --}}
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    {{-- @dd($pujas[0]->thumbnals); --}}
                                    @if($pujas)
                                    @forelse($pujas as $key => $puja)
                                    <tr class="manage-enable">
                                        <td>
                                            <p>#{{ $key + 1 }}</p>
                                        </td>
                                        <td>
                                            <img src="{{ asset('thumbnail_img/'.$puja->thumbnals) }}" alt=""
                                                width="100px" height="80px">
                                        </td>
                                        <td>
                                            <p>{{ $puja->temple->name }}</p>
                                        </td>
                                        <td>
                                            <p>{{ $puja->name }}</p>
                                        </td>
                                        {{-- <td>
                                            <p>{{ $puja->title }}</p>
                                        </td> --}}

                                        <td>
                                            {{ \Carbon\Carbon::createFromFormat('Y-m-d',
                                            $puja->puja_start_date)->format('d F Y')}}

                                            {{-- <p>{{ $puja->puja_start_date }}</p> --}}
                                        </td>
                                        <td>
                                            {{ \Carbon\Carbon::createFromFormat('Y-m-d',
                                            $puja->puja_end_date)->format('d F Y')}}
                                            {{-- <p>{{ $puja->puja_end_date }}</p> --}}
                                        </td>
                                        <td>
                                            {{ \Carbon\Carbon::createFromFormat('H:i:s',
                                            $puja->puja_start_time)->format('h:i A')}}
                                            {{-- <p>{{ $puja->puja_start_time }}</p> --}}
                                        </td>
                                        <td>
                                            {{ \Carbon\Carbon::createFromFormat('H:i:s',
                                            $puja->puja_end_time)->format('h:i A')}}
                                            {{-- <p>{{ $puja->puja_end_time }}</p> --}}
                                        </td>
                                        <td class="brk_line">
                                            <p>{{$puja->description }}</p>
                                        </td>
                                        {{-- <td>
                                            <p>{{ $puja->live_strimeng_link }}</p>
                                        </td> --}}
                                        <td>
                                            <div class="board-right">
                                                <a class="dropdown-item editPuja" data-uuid="{{ $puja->uuid }}"
                                                    href="javascript:void(0)"><i class="fa mr-1" aria-hidden="true"><img
                                                            src="{{asset('assets/img/material-edit_icon.png')}}"
                                                            alt=""></i></a>
                                                <a class="dropdown-item deleteData text-danger"
                                                    data-uuid="{{ $puja->uuid }}" data-table="pujas"
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
<x-modals.puja.add-puja />
@endsection
@push('scripts')

<script src="{{ asset('assets/js/ajax/puja.js') }}"></script>
<script src="{{ asset('assets/js/ajax/submit.js') }}"></script>
@endpush
