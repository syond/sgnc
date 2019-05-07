@include('layouts/header')


@include('layouts/nav')


@include('layouts/sidebar')



<div class="content-main">

    @include('layouts/navmap')

    @yield('content')

</div>

@include('layouts/footer')
