@extends('layouts.app', ['isSidebar' => true, 'isNavbar' => true, 'isFooter' => true])
@section('news-active','active')
@section('title',__('News'))
@push('styles')
@endpush
@section('content')
<div class="dashboard-content">
    <div class="row">
        <!-- DashboardLeft Content -->
        <div class="col-lg-12">
            <div class="tablehead p-0">
                <h4>List of News</h4>
                <div class="tablehead-right">
                    <div class="viewtext mt-0">
                        <button type="button" class="btn qrcode-list-btn mt-0" data-toggle="modal"
                            data-target="#addNews"><i class="fa fa-plus-circle" aria-hidden="true"></i> Add
                            News</button>
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
                                        <th>Title</th>
                                        <!--<th>Date</th>-->
                                        <!--<th>Time</th>-->
                                        <th>Description</th>
                                        <th>URL</th>
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
                                            <p>{{ $data->title }}</p>
                                        </td>
                                        <!--<td>-->
                                        <!--    {{-- <p>{{ $data->date }}</p> --}}-->
                                        <!--    {{ \Carbon\Carbon::createFromFormat('Y-m-d', $data->date)->format('d F Y')}}-->

                                        <!--</td>-->
                                        <!--<td>-->
                                        <!--    {{-- <p>{{ $data->time }}</p> --}}-->
                                        <!--    {{ \Carbon\Carbon::createFromFormat('H:i:s', $data->time)->format('h:i A')}}-->

                                        <!--</td>-->
                                        <td class="brk_line">
                                            <p>{{ $data->description }}</p>
                                        </td>
                                        <td class="brk_line">
                                            <p>{{ $data->news_url }}</p>
                                        </td>
                                        <td>
                                            <div class="board-right">
                                                <a class="dropdown-item editNews" data-uuid="{{ $data->uuid }}"
                                                    href="javascript:void(0)"><i class="fa mr-1" aria-hidden="true"><img
                                                            src="{{asset('assets/img/material-edit_icon.png')}}"
                                                            alt=""></i></a>
                                                <a class="dropdown-item deleteData text-danger"
                                                    data-uuid="{{ $data->uuid }}" data-table="news"
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
<x-modals.news.add-news />
@endsection
@push('scripts')
{{-- <script src="//cdn.ckeditor.com/4.14.1/standard/ckeditor.js"></script> --}}
<script src="{{ asset('assets/js/ajax/news.js') }}"></script>
<script src="{{ asset('assets/js/ajax/submit.js') }}"></script>
@endpush
