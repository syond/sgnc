@include('layouts/header')

@include('layouts/nav')

@include('layouts/sidebar')

<div class="content-main">

    @component('layouts/navmap')

    <div class="grid-form">
        <div class="grid-form1">
            @include('layouts/flash-message')
            @yield('content')
        </div>
    </div>

</div>

@include('layouts/footer')
