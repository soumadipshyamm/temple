@extends('layouts.app', ['isSidebar' => true, 'isNavbar' => true, 'isFooter' => true])
@section('special-event-active','active')
@section('title',__('Special Event'))
@push('styles')
@endpush
@section('content')
<div class="dashboard-content">
    <div class="row">
        <!-- DashboardLeft Content -->
        <div class="col-lg-12">
            <div class="tablehead p-0">
                <h4>List of Special Event</h4>
                <div class="tablehead-right">
                    <div class="viewtext mt-0">
                        <button type="button" class="btn qrcode-list-btn mt-0" data-toggle="modal" data-target="#addSpecialEvent"><i class="fa fa-plus-circle" aria-hidden="true"></i> Add
                            Special Event</button>
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
                                        <th>Client Id</th>
                                        <th>Client Name</th>
                                        <th>Phone No.</th>
                                        <th>Email</th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    {{-- @if($temples)
                                    @forelse($temples as $key => $temple) --}}
                                    <tr class="manage-enable">
                                        {{-- <td>
                                            <p>#{{ $key + 1 }}</p>
                                        </td>
                                        <td>
                                            <p>{{ $temple->name }}</p>
                                        </td>
                                        <td>
                                            <p>{{$temple->phone_number }}</p>
                                        </td>
                                        <td>
                                            <p>{{ $temple->email }}</p>
                                        </td>
                                        <td>
                                            <div class="board-right">
                                                <a class="dropdown-item editEvent" data-uuid="{{ $temple->uuid }}" href="javascript:void(0)"><i class="fa mr-1" aria-hidden="true"><img src="{{asset('assets/img/material-edit_icon.png')}}" alt=""></i></a>
                                                <a class="dropdown-item deleteData" data-uuid="{{ $temple->uuid }}" data-table="clients" href="javascript:void(0)"><i class="fa mr-1" aria-hidden="true"><img src="{{asset('assets/img/feather-trash_icon.png')}}" alt=""></i></a>
                                            </div>
                                        </td> --}}
                                    </tr>
                                    {{-- @empty
                                    @endforelse
                                    @endif --}}
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
<x-modals.event.add-special-event />
@endsection
@push('scripts')

<script src="{{ asset('assets/js/ajax/event.js') }}"></script>
<script src="{{ asset('assets/js/ajax/submit.js') }}"></script>
@endpush
