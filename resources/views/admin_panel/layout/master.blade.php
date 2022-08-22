@include('frontend.includes.head')


<!-- PAGE -->
<div class="page">
    <div class="page-main">
        @include('frontend.includes.header')

        @include('frontend.includes.leftsidebar')

        @yield('content')
    </div>

    @include('frontend.includes.rightsidebar')

    @include('frontend.includes.countryselector')

    @include('frontend.includes.footer')

</div>

@include('frontend.includes.foot')
