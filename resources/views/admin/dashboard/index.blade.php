@extends('layouts.app', ['isSidebar' => true, 'isNavbar' => true, 'isFooter' => true])
@section('dashboard-active','active')
@section('title',__('Dashboard'))
@push('styles')
@endpush
@section('content')
<!-- Dashboard Content -->
<div class="dashboard-content">
    <div class="row">
        <div class="dashboard-head">
            <h3 class="header_title">
                Today's
            </h3>
        </div>
        <!-- DashboardLeft Content -->
        <div class="col-md-12">
            <div class="row">
                <div class="col-lg-3 com-md-3 col-12">
                    <div class="dashcard">
                        <p>No of Temple</p>
                        <h2>
                            {{ count($temple) }}
                        </h2>
                        <div class="dashcard-footer">
                            <div class="dashcard-footer-arrow"><a href="{{ route('temple.list') }}"><img
                                        src="{{asset('assets/img/dashcard-footer-arrow.png')}}" class="" alt=""></a>
                            </div>
                            <div class="metro-qrcode"><a href="#"><span class="nav-iconbg"> <i class="fas fa-tasks"></i></span></a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 com-md-3 col-12">
                    <div class="dashcard">
                        <p>No of puja</p>

                        <h2 class="text-primary"> {{ count($puja) }}</h2>
                        <div class="dashcard-footer">
                            <div class="dashcard-footer-arrow"><a href="{{ route('puja.list') }}"><img
                                        src="{{asset('assets/img/dashcard-footer-arrow.png')}}" class="" alt=""></a>
                            </div>
                            <div class="metro-qrcode"><a href="#"><span class="nav-iconbg"> <i class="fas fa-gopuram"></i></span></a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 com-md-3 col-12">
                    <div class="dashcard">
                        <p>No of Live Streaming </p>
                        <h2 class="text-warning">
                            {{ count($liveStreaming) }}
                        </h2>
                        <div class="dashcard-footer">
                            <div class="dashcard-footer-arrow"><a href="{{ route('streaming.list') }}"><img
                                        src="{{asset('assets/img/dashcard-footer-arrow.png')}}" class="" alt=""></a>
                            </div>
                            <div class="metro-qrcode"><a href="#"><span class="nav-iconbg"> <i class="fas fa-tv"></i></span></a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 com-md-3 col-12">
                    <div class="dashcard">
                        <p>No of Special Event</p>
                        <h2 class="text-purple">
                            {{ count($specialEvent) }}
                        </h2>
                        <div class="dashcard-footer">
                            <div class="dashcard-footer-arrow"><a href="{{ route('specialEvent.list') }}"><img
                                        src="{{asset('assets/img/dashcard-footer-arrow.png')}}" class="" alt=""></a>
                            </div>
                            <div class="metro-qrcode"><a href="#"><span class="nav-iconbg"> <i class="far fa-calendar-alt"></i></span></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="dash-recentused dashpadding_box mt-4">
                <div class="tablehead">
                    <h3>Temple List</h3>
                    <div class="viewtext"><a href="{{ route('temple.list') }}">View All <i class="fa ml-1"
                                aria-hidden="true"><img src="{{asset('assets/img/Iconfeather-arrow-down-left.png')}}"
                                    alt=""></i></a></div>
                </div>
                <div class="table-responsive dastable pd-sec">
                    <table class="table table-striped table-hover dataTable">
                        <thead>
                            <tr class="manage-bg-dark">
                                <th>SL No.</th>
                                <th>Thumbnail</th>
                                <th> Temple Name</th>
                                <th>Country</th>
                                <th>State </th>
                                <th>City</th>
                            </tr>
                        </thead>
                        <tbody>
                            @if($temple)
                            @forelse($temple as $key => $temple)
                            <tr class="manage-enable">
                                <td>
                                    <p>#{{ $key + 1 }}</p>
                                </td>
                                <td>
                                    <img src="{{asset('thumbnail_img/'. $temple->img) }}" alt="" width="100px"
                                        height="80px">
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


                            </tr>
                            @empty

                            @endforelse
                            @endif
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <!-- DashboardLeft Content -->
    </div>
</div><!-- Dashboard Content End -->
@endsection
@push('scripts')
<script src="{{ asset('assets/js/ajax/submit.js') }}"></script>
@endpush
