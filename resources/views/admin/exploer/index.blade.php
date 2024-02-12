@extends('layouts.app', ['isSidebar' => true, 'isNavbar' => true, 'isFooter' => true])
@section('exploer-active','active')
@section('title',__('Explore'))
@push('styles')
@endpush
@section('content')
<div class="dashboard-content">
    <div class="row">
        <!-- DashboardLeft Content -->
        <div class="col-lg-12">
            <div class="tablehead p-0">
                <h4>List of Explore Temple</h4>
                <div class="tablehead-right">
                    <div class="viewtext mt-0">
                        {{-- <button type="button" class="btn qrcode-list-btn mt-0" data-toggle="modal"
                            data-target="#addPuja"><i class="fa fa-plus-circle" aria-hidden="true"></i> Add New
                            Puja</button> --}}
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
                                        <th>Status</th>


                                    </tr>
                                </thead>
                                <tbody>
                                    @if($datas)
                                    @forelse($datas as $key => $temple)
                                    <tr class="manage-enable">
                                        <td>
                                            <p>#{{ $key + 1 }}</p>
                                        </td>
                                        <td>
                                            <p>{{ $temple->name }}</p>
                                        </td>
                                        {{-- <td>
                                            <p>{{ $temple->explore== 0 ? 'deactive' : 'active' }}</p>
                                        </td> --}}
                                        <td>
                                            <div class="custom-control custom-switch">
                                                <input type="checkbox" class="custom-control-input statusChange" id="switch{{ $temple->uuid }}" data-uuid="{{ $temple->uuid }}" data-message="{{ $temple->explore ? 'deactive' : 'active' }}" data-table="temples" name="example" {{ $temple->explore == 1 ? 'checked' : '' }}>
                                                <label class="custom-control-label " for="switch{{ $temple->uuid }}"></label>
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
@endsection
@push('scripts')
<script src="{{ asset('assets/js/ajax/exploer.js') }}"></script>
@endpush
