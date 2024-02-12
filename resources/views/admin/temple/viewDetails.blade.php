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
                        <a href="{{ route('temple.list') }}" class="btn qrcode-list-btn mt-0" id="templeBack">
                            <-Back </a>

                    </div>
                    <!-- Modal -->
                </div>
            </div>
            <div class="dash-recentused dashpadding_box mt-4">
                <!-- Tab panes -->
                <div class="tab-content">
                    <div id="home" class="container tab-pane active p-0">
                        <div class="table-responsive">
                            <table class="table">
                                <tbody>
                                    @if($temples)
                                    @forelse($temples as $key => $temple)
                                    <tr class="manage-enable">
                                        <td> <label for="">Consecrated Deity</label>
                                            <p>{{$temple->consecrated_deity }}</p>

                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <label for="">Temple Existence</label>
                                            <p>{{$temple->temple_existence }}</p>

                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <label for="">Special Poojas Sevas</label>
                                            <p>{{$temple->special_poojas_sevas }}</p>

                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <label for="">Accommodation</label>
                                            <p>{{$temple->accommodation }}</p>

                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <label for="">Temple Transport</label>
                                            <p>{{$temple->temple_transport }}</p>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <label for="">Temple Authority</label>
                                            <p>{{$temple->temple_authority }}</p>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <label for="">Books Magazines</label>
                                            @if($temple->books_magazines)
                                            <p>YES</p>
                                            @else
                                            <p>NO</p>
                                            @endif
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <label for="">Temple Donations</label>
                                            @if($temple->temple_donations)
                                            <p>YES</p>
                                            @else
                                            <p>NO</p>
                                            @endif
                                        </td>
                                    </tr>

                                    <tr>
                                        <td>
                                            <label for="">Description</label>
                                            <p>{!! $temple->description !!}</p>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <label for="">History</label>
                                            <p>{!! $temple->history !!}</p>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td> <label for="">Rules</label>
                                            <p>{!! $temple->rules !!}</p>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td> <label for="">Tradition</label>
                                            <p>{!! $temple->tradition !!}</p>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td> <label for="">Publication</label>
                                            <p>{!! $temple->publication !!}</p>
                                        </td>
                                    </tr>
                                     <tr>
                                        <td> <label for="">Booking Url</label>
                                            <p>{!! $temple->booking !!}</p>
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
<script src="{{ asset('assets/js/ajax/temple.js') }}"></script>
<script src="{{ asset('assets/js/ajax/submit.js') }}"></script>
@endpush

