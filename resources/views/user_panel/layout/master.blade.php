@include('user_panel.frontend.includes.head')


<!-- PAGE -->
<div class="page">
    <div class="page-main">
        @include('user_panel.frontend.includes.header')

        @include('user_panel.frontend.includes.leftsidebar')

        @yield('content')
    </div>

    @include('user_panel.frontend.includes.rightsidebar')

    @include('user_panel.frontend.includes.countryselector')

    @include('user_panel.frontend.includes.footer')

</div>

@include('user_panel.frontend.includes.foot')
