<aside class="main-sidebar sidebar-dark-primary">
    {{-- {{ dd(getSettings()->web_logo) }} --}}
    <!-- Brand Logo -->
    <a href="" class="brand-link">
        {{-- @if(getSettings()) --}}
        <img src="{{ asset('assets/img/logo/logo.png') }}" alt="Logo" style="height:55px;width:170px">
        {{-- @endif --}}
        {{-- <img src="{{ asset('assets/customer/images/bewise-logo.png')}}" alt="E-learning Web Portal"
            style="height:40px;width:170px"> --}}
        <span class="brand-text"></span>
    </a>
    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                {{-- @canany(['view-dashboard']) --}}
                {{-- @if(auth()->user()->hasRole('super-admin'))
                @canany(['dashboard']) --}}
                <li class="nav-item">
                    <a href="{{ route('dashboard.list') }}" class="nav-link @yield('dashboard-active')">
                        <span class="nav-iconbg"> <i class="fa"><img src="{{ asset('assets/img/dashboard.png') }}"
                                    alt=""> </i></span>
                        <p>Dashboard</p>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="{{ route('temple.list') }}" class="nav-link @yield('temple-active')">
                        <span class="nav-iconbg"> <i class="fas fa-tasks"></i></span>
                        <p>Temple Management</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('exploer.list') }}" class="nav-link @yield('exploer-active')">
                        <span class="nav-iconbg"> <i class="fas fa-search-plus"></i></span>
                        <p>Explore Temple</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('banner.list') }}" class="nav-link @yield('banner-active')">
                        <span class="nav-iconbg">
                        <i class="fas fa-images"></i>
                        </span>
                        <p>Banner Images</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('puja.list') }}" class="nav-link @yield('puja-active')">
                        <span class="nav-iconbg"> <i class="fas fa-gopuram"></i></span>
                        <p>Puja Management</p>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="{{ route('streaming.list') }}" class="nav-link @yield('live-strimeng-active')">
                        <span class="nav-iconbg"> <i class="fas fa-tv"></i></span>
                        <p>Live Streaming</p>
                    </a>
                </li>


                <li class="nav-item">
                    <a href="{{ route('specialEvent.list') }}" class="nav-link @yield('special-event-active')">
                        <span class="nav-iconbg"> <i class="far fa-calendar-alt"></i></span>
                        <p>Special Event Management</p>
                    </a>
                </li>
              <li class="nav-item">
                    <a href="{{ route('festival.list') }}" class="nav-link @yield('festivals-active')">
                        <span class="nav-iconbg"><i class="fas fa-bullhorn"></i></span>
                        <p>Festival</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('socialServices.list') }}" class="nav-link @yield('social-services-active')">
                        <span class="nav-iconbg"> <i class="fas fa-user-friends"></i></span>
                        <p>Social Services</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('relevantWebsite.list') }}" class="nav-link @yield('relevant-websites-active')">
                        <span class="nav-iconbg"> <i class="fas fa-globe-asia"></i></span>
                        <p>Relevant Websites</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('donation.list') }}" class="nav-link @yield('donation-active')">
                        <span class="nav-iconbg">
                        <i class="fas fa-hand-holding-usd"></i>
                        </span>
                        <p>Donation</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('news.list') }}" class="nav-link @yield('news-active')">
                        <span class="nav-iconbg">
                        <i class="far fa-newspaper"></i>
                        </span>
                        <p>News</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('alliedServices.list') }}" class="nav-link @yield('allied-services-active')">
                        <span class="nav-iconbg"> <i class="fas fa-user-cog"></i></span>
                        <p>Allied Services</p>
                    </a>
                </li>

            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>
