@extends('frontend.includes.head')


<!-- PAGE -->
<div class="page">
    <div class="page-main">
        @extends('frontend.includes.header')

        @extends('frontend.includes.leftsidebar')

        @yield('content')
    </div>

    @extends('frontend.includes.rightsidebar')

    @extends('frontend.includes.countryselector')

    @extends('frontend.includes.footer')

</div>

@extends('frontend.includes.foot')
