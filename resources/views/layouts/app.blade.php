<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
@include('layouts.partials.header')

<body class="hold-transition sidebar-mini">
    <div class="wrapper">
        {{-- @include('layouts.partials.flash') --}}
        @include('layouts.partials.navbar')
        @include('layouts.partials.sidebar')
        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <!-- Main content -->
            <div class="content pt-4">
                <div class="container-fluid">
                    @yield('content')
                    {{-- <x-modals.password-update /> --}}
                    <x-modals.update-password.update-password />
                </div>
            </div>
        </div>
        @include('layouts.partials.footer')
    </div>
</body>
@include('layouts.partials._footer')

</html>
